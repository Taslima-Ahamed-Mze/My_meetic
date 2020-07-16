$(document).ready(function(){
     s = new slider(".carossel");
});

var slider = function(id){
    
    var self = this;
    this.div = $(id);
    this.slider = this.div.find(".personnes");
    
        
    this.largeurCache = this.div.width();
    
    this.largeur = 0;
    this.div.find('a').each(function(){
        self.largeur+=$(this).width();
    });
    
    this.prec = $("#prec");
    this.suiv = $("#suiv");
    this.saut = this.largeurCache/2;
    

    this.nbEtape = Math.ceil(this.largeur/this.saut - this.largeurCache/this.saut);
    this.courant = 0;
    this.suiv.click(function(){
        if(self.courant<=self.nbEtape)
        {
            self.courant++;
            self.slider.animate({
                left:-self.courant*self.saut
            },1000);
        }
    });

    this.prec.click(function(){
        if(self.courant>0)
        {
            self.courant--;
            self.slider.animate({
                left:-self.courant*self.saut
            },1000);
        }
    });


}
