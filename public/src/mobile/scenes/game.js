const VELOCITY = 480;
// Useful vars
let width, height, mContext, floor, player, elemsFall = [],
    scoreText, liveText, timeText, elemsInterval, time = 60, timeInterval, loose = false, gameOver = false, enablePost = true,
    elemsKeys = ['dorito', 'dorito2', 'burger'];

// Movements
let goRight = false, goLeft = false, leftBtn, rightBtn, jumpBtn, jump = false;

// Filled
let arepa;

export class Game extends Phaser.Scene {
    constructor() {
        super('Game');
    }

    create() {
        mContext = this;
        leftBtn.on('pointerdown', function () {
            leftBtn.setScale(1.1);
            goLeft = true;
        });

        leftBtn.on('pointerup', function () {
            goLeft = false;
        });

        leftBtn.on('pointerout', () => {
            leftBtn.setScale(1);
            goLeft = false;
        });

        // --------------------------------------

        rightBtn.on('pointerdown', function () {
            rightBtn.setScale(1.1);
            goRight = true;
        });

        rightBtn.on('pointerup', function () {
            goRight = false;
        });

        rightBtn.on('pointerout', () => {
            rightBtn.setScale(1);
            goRight = false;
        });

        // --------------------------------------

        jumpBtn.on('pointerdown', function () {
            jumpBtn.setScale(1.1);
            jump = true;
        });

        jumpBtn.on('pointerup', function () {
            jump = false;
        });

        jumpBtn.on('pointerout', () => {
            jumpBtn.setScale(1);
            jump = false;
        });

        // TIME
        timeInterval = setInterval(() => {
            time -= 1;
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;
            timeText.setText(minutes + '0:' + (seconds < 10 ? '0' + seconds : seconds));
            if (time <= 0) {
                clearInterval(timeInterval);
                clearInterval(elemsInterval);
                gameOver = true;
                mContext.popUp();
            }
        }, 1000);

        // Elems Fall
        elemsInterval = setInterval(() => {
            let elem = this.physics.add.sprite(Phaser.Math.Between(20, (width - 20)), 0, elemsKeys[this.getRandomNumber(0, elemsKeys.length)]).setScale(.8);
            elem.setSize(0, 20, true);
            elemsFall.push(elem);
        }, 600);

        // Colliders
        this.physics.add.collider(player, floor);
        this.physics.add.overlap(player, elemsFall, this.hitElem, null, this);

        // Animations
        player.anims.create({
            key: 'iddle',
            frames: this.anims.generateFrameNumbers('player_iddle', { start: 0, end: 6 }),
            frameRate: 12,
            repeat: 1
        });

        player.anims.create({
            key: 'run_left',
            frames: this.anims.generateFrameNumbers('player_run_left', { start: 0, end: 11 }),
            frameRate: 15,
            repeat: 1
        });

        player.anims.create({
            key: 'run_right',
            frames: this.anims.generateFrameNumbers('player_run_right', { start: 0, end: 11 }),
            frameRate: 15,
            repeat: 1
        });

        player.anims.create({
            key: 'jump',
            frames: this.anims.generateFrameNumbers('player_jump', { start: 0, end: 0 }),
            frameRate: 8,
            repeat: 1
        });

        player.anims.create({
            key: 'fall',
            frames: this.anims.generateFrameNumbers('player_fall', { start: 0, end: 11 }),
            frameRate: 30,
            repeat: 0
        });
    }

    update() {
        if (!loose) {
            if (goLeft) {
                player.setVelocityX(-VELOCITY);
                if (player.body.touching.down) { player.anims.play('run_left', true); }
            } else if (goRight) {
                player.setVelocityX(VELOCITY);
                if (player.body.touching.down) { player.anims.play('run_right', true); }

                if (!player.body.touching.down) { player.flipX = true; }
            } else {
                if (player.body.touching.down) {
                    player.anims.play('iddle', true);
                    player.flipX = false;
                }
                player.setVelocityX(0);
            }

            if (jump && player.body.touching.down) {
                player.setVelocityY(-VELOCITY);
                player.anims.play('jump', true);
            }
        }

        elemsFall.forEach(elem => {
            elem.setAngularVelocity(Phaser.Math.RadToDeg(elem.body.velocity.y / 225));
        });
    }

    init() {
        width = this.game.config.width;
        height = this.game.config.height;

        this.add.image(0, 0, 'background').setOrigin(0);
        floor = this.physics.add.staticGroup();
        floor.create(15, (height - 190), '').setSize(width, 20).setOffset(0, 20).setAlpha(0.001);

        leftBtn = this.add.image(110, height - 120, 'left-btn').setInteractive().setDepth(1);
        rightBtn = this.add.image(leftBtn.x + 200, leftBtn.y, 'right-btn').setInteractive().setDepth(1);
        jumpBtn = this.add.image(rightBtn.x + 280, leftBtn.y, 'jump-btn').setInteractive().setDepth(1);

        player = this.physics.add.sprite((width / 2), height - 400, 'player_iddle', 0).setScale(.5);
        player.setSize(300, 620, true).setOffset(40, 150);
        player.body.checkCollision.left = false;
        player.body.checkCollision.right = false;
        player.score = 0;
        player.lives = 3;
        player.setCollideWorldBounds(true);

        let livesBg = this.add.image((width / 2), 80, 'lives-bg').setDepth(1);
        let scoreBg = this.add.image((livesBg.x - 250), 80, 'score-bg').setDepth(1);
        let timeBg = this.add.image((livesBg.x + 250), 80, 'time-bg').setDepth(1);

        liveText = this.add.text((width / 2) + 20, 58, player.lives, { font: '40px primary-font', fill: '#fff' }).setDepth(1);
        scoreText = this.add.text((livesBg.x - 300), 58, '0 PTS', { font: '40px primary-font', fill: '#fff' }).setDepth(1);
        timeText = this.add.text((livesBg.x + 200), 58, '00:00', { font: '40px primary-font', fill: '#fff' }).setDepth(1);
    }

    getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    hitElem(player, elem) {
        if ((elem.texture.key === 'dorito2' || elem.texture.key === 'dorito') && !loose) {
            player.score += 5;
            scoreText.setText(player.score + " PTS");
        } else if (!loose) {
            loose = !loose;
            player.lives -= 1;
            liveText.setText(player.lives);
            player.score = ((player.score - 10) <= 0) ? 0 : player.score -= 10;

            scoreText.setText(player.score + " PTS");
            player.anims.play('fall', true);

            if (player.lives == 0) {
                gameOver = true;
                mContext.popUp();
            }

            setTimeout(() => { loose = !loose; }, 2000);
        }

        if (player.score > 9 && player.score < 100) {
            scoreText.x = (50);
        } else if (player.score > 99) {
            scoreText.x = (35);
        }

        elemsFall.splice(elemsFall.indexOf(elem), 1);
        elem.destroy();
    }

    popUp() {
        clearInterval(timeInterval);
        clearInterval(elemsInterval);
        mContext.deleteElems();
        let bg = this.add.image(0, 0, 'background_tutorial').setOrigin(0, 0).setDepth(1);
        let title = this.add.image(width / 2, (height / 4), 'title-score').setDepth(1);
        const fxShadow = title.preFX.addShadow(0, 0, 0.006, 2, 0x333333, 10);

        let scoreText1 = "GANASTE \n ";
        let scoreText2 = "\n PUNTOS";

        const screenCenterX = this.cameras.main.worldView.x + this.cameras.main.width / 2;
        let score1 = this.add.text((width / 2), (height / 2), scoreText1, { font: '80px primary-font', fill: '#fff', align: "center" }).setOrigin(0.5).setDepth(1);
        let score = this.add.text((width / 2), ((height / 2) + 150), player.score, { font: '400px primary-font', fill: '#fff', align: "center" }).setOrigin(0.5).setDepth(1);
        let score2 = this.add.text(((width / 2) - 30), ((score.y) + 180), scoreText2, { font: '80px primary-font', fill: '#00cb9b', align: "center" }).setOrigin(0.5).setDepth(1);

        let footer = this.add.image(width / 2, (height - 100), 'title-footer').setDepth(1);

        this.add.tween({
            targets: title,
            scale: 1.05,
            duration: 800,
            yoyo: true,
            repeat: 1
        });

        this.add.tween({
            targets: fxShadow,
            x: 2,
            y: -2,
            duration: 800,
            yoyo: true,
            repeat: 1
        });

        setTimeout(() => {
            if (enablePost) {
                enablePost = false;
                axios.post('/storePuntos', {
                    puntos: player.score
                })
                    .then(function (response) {
                        let data = response.data;
                        if (data.status === 200) {
                            location.reload();
                        } else {
                            alert("Opps, algo salió mal, inténtalo de nuevo mas tarde.");
                            location.reload();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }, 500);
    }

    deleteElems() {
        elemsFall.forEach(elem => {
            elem.disableBody(false, false);
        });
    }
}   