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
        let title = this.add.image(width/2, (height/4), 'title');
        const fxShadow = title.preFX.addShadow(0, 0, 0.006, 2, 0x333333, 10);
        let tutorial = this.add.image(width/2, ((height/2) - 30), 'tutorial');
        let tutorial2 = this.add.image(width/2, (height/2) + 120, 'tutorial2');
        let tutorial3 = this.add.image(width/2, ((height/2) + 300), 'tutorial3');
        let volverBtn = this.add.image(45, (title.y/5), 'volver-btn');
        volverBtn.setInteractive();
        let acpetarBtn = this.add.image(width/2, ((height/2) + 470), 'aceptar-btn');
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

        volverBtn.on('pointerdown', function(){
            volverBtn.setScale(1.1);
        });

        volverBtn.on('pointerup', function(){
            
        });

        volverBtn.on('pointerout', () => {            
            volverBtn.setScale(1); 
        });
    }
    
    init(){
        width = this.game.config.width;
        height = this.game.config.height;
    }
}