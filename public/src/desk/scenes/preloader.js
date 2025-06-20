export class Preloader extends Phaser.Scene {
    constructor ()
    {
        super('Preloader');
    }

    preload ()
    {
        this.load.setPath('assets/desk');
        /* PLAYER */
        this.load.spritesheet('player_iddle', './animaciones/player_iddle.png', { frameWidth: 389, frameHeight: 779 });
        this.load.spritesheet('player_run_left', './animaciones/player_run_left.png', { frameWidth: 389, frameHeight: 779 });
        this.load.spritesheet('player_run_right', './animaciones/player_run_right.png', { frameWidth: 389, frameHeight: 779 });
        this.load.spritesheet('player_jump', './animaciones/player_jump.png', { frameWidth: 389, frameHeight: 779 });
        this.load.spritesheet('player_fall', './animaciones/player_fall.png', { frameWidth: 893, frameHeight: 779 });        

        /* ELEMS */
        this.load.image('background', './elems/bg.jpg'); 
        this.load.image('score-bg', './elems/score_bg.png');
        this.load.image('lives-bg', './elems/lives_bg.png');
        this.load.image('time-bg', './elems/time_bg.png');
        
        /* BUTTONS */
        this.load.image('left-btn', './botones/left.png');
        this.load.image('right-btn', './botones/right.png');
        this.load.image('jump-btn', './botones/jump.png');

        /* TUTORIAL */
        this.load.image('background_tutorial', './tutorial/bg_tutorial.jpg');
        this.load.image('aceptar-btn', './tutorial/aceptar_btn.png');
        this.load.image('volver-btn', './tutorial/volver_btn.png');
        this.load.image('title', './tutorial/title.png');
        this.load.image('tutorial', './tutorial/tutorial.png');
        this.load.image('tutorial2', './tutorial/tutorial2.png');
        this.load.image('tutorial3', './tutorial/tutorial3.png'); 
        this.load.spritesheet('anim1', './tutorial/anim1.png', { frameWidth: 240, frameHeight: 480 }); 
        this.load.spritesheet('anim2', './tutorial/anim2.png', { frameWidth: 240, frameHeight: 480 }); 

        /* POPUP */
        this.load.image('title-score', './popup/title_score.png');
        this.load.image('title-footer', './popup/socore_footer.png');

        this.load.image('burger', './elems/burger.png');
        this.load.image('dorito', './elems/dorito.png');
        this.load.image('dorito2', './elems/dorito2.png');
    }

    create ()
    {
        this.scene.start('Tutorial');
        // this.scene.start('Game');
    } 
}