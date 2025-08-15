let width, height, mContext;

export class Tutorial extends Phaser.Scene {
    constructor ()
    {
        super('Tutorial');
    }

    create ()
    {
        mContext = this;
        let bg = this.add.image(0, 0, 'background_tutorial').setOrigin(0, 0);
        bg.setDisplaySize(width, height);
        let title = this.add.image(width/4, (height/2), 'title');
        const fxShadow = title.preFX.addShadow(0, 0, 0.006, 2, 0x333333, 10);

        let tutorial = this.add.image((title.width) + 500, (height/2) - 250, 'tutorial');
        let anim1 = this.add.sprite((title.width) + 900, (height/2) - 300, 'anim1').setScale(.5);
        anim1.anims.create({
            key: 'anim1',
            frames: this.anims.generateFrameNumbers('anim1', { start: 0, end: 14 }),
            frameRate: 12,
            repeat: -1
        });
        anim1.anims.play('anim1');

        let tutorial2 = this.add.image((title.width) + 500, (height/2), 'tutorial2');

        let tutorial3 = this.add.image((title.width) + 500, (height/2) + 250, 'tutorial3');
        let anim2 = this.add.sprite((title.width) + 900, (height/2) + 200, 'anim2').setScale(.5);
        anim2.anims.create({
            key: 'anim2',
            frames: this.anims.generateFrameNumbers('anim2', { start: 0, end: 14 }),
            frameRate: 12,
            repeat: -1
        });
        anim2.anims.play('anim2');

        // let volverBtn = this.add.image(90, 90, 'volver-btn');
        // volverBtn.setInteractive();
        let acpetarBtn = this.add.image((width - (width/3)), ((tutorial3.y + (tutorial3.height))), 'aceptar-btn');
        acpetarBtn.setInteractive();

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

        acpetarBtn.on('pointerdown', function(){
            acpetarBtn.setScale(1.1);
        });

        acpetarBtn.on('pointerup', function(){
            mContext.scene.start('Game');
        });

        acpetarBtn.on('pointerout', () => {
            acpetarBtn.setScale(1);
        });

        // volverBtn.on('pointerdown', function(){
        //     volverBtn.setScale(1.1);
        // });

        // volverBtn.on('pointerup', function(){

        // });

        // volverBtn.on('pointerout', () => {
        //     volverBtn.setScale(1);
        // });
    }

    init(){
        width = this.game.config.width;
        height = this.game.config.height;
    }
}
