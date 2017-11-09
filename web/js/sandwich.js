
//-------------------
Pain = function(_code, _intitule, _prix, _img){
    self = this;
    self.code = null;
    self.intitule = null;
    self.img = null;
    self.prix = 0;
    self.quantite = 1;

    self.init = function(){
        self.code = _code;
        self.prix = _prix;
        self.img = _img;
        self.intitule = _intitule;
    }


    self.init()
}

//-------------------
Garniture = function(_code, _intitule, _prix, _type){
    selfGarni = this;
    selfGarni.code = null;
    selfGarni.intitule = null;
    selfGarni.type = null;
    selfGarni.prixUnit = null;
    selfGarni.prix = null;
    selfGarni.quantite = null;

    selfGarni.init = function(){
        selfGarni.quantite = 1;
        selfGarni.code = _code;
        selfGarni.prixUnit = _prix;
        selfGarni.prix = _prix;
        selfGarni.type = _type;
        selfGarni.intitule = _intitule;
    }

    selfGarni.updateQte = function(_qte){
        selfGarni.quantite = _qte;
        selfGarni.prix = selfGarni.prixUnit * _qte;
    }


    selfGarni.init()
}

//-------------------
Sandwich = function(_pain, _code, _garniture){
    selfSand = this;
    selfSand.code = null;
    selfSand.pain = null;
    selfSand.garnitures = {val: null};
    selfSand.prix = null;

    selfSand.init = function(){
        selfSand.pain = _pain;
        selfSand.code = _code;
        selfSand.garnitures[_garniture.code]= _garniture;
        selfSand.prix = _pain.prix + _garniture.prix;
    }

    // ajout ligne de garniture
    selfSand.addGarniture = function(_garniture, _codeGarniture){

        if (selfSand.garnitures.hasOwnProperty(_codeGarniture))  {
            selfSand.garnitures[_codeGarniture].quantite++;
        } else {
            selfSand.garnitures[_codeGarniture] = _garniture;
        }

        selfSand.prix = selfSand.prix + _garniture.prix;
    }

    // modifi la quantite d une ligne de garniture
    selfSand.updateGarniture1 = function(_code, _qte){

        // ancien prix d garniture
        var _oldPrix = selfSand.garnitures[_code].prix;

        selfSand.garnitures[_code].quantite = _qte;
        selfSand.garnitures[_code].prix = selfSand.garnitures[_code].prixUnit * _qte;
        // prix sandwich  = prix sand + nouveau prix garn - ancien prix garn
        selfSand.prix = selfSand.prix + selfSand.garnitures[_code].prix - _oldPrix;

    }
    //*--
    selfSand.updateGarniture2 = function(_code){


        selfSand.updateGarniture1(_code, 1)
    }
    //*--
    selfSand.updateGarniture3 = function(_oldCode){

        console.log(_oldCode)
        // ancien prix d garniture
        var _oldPrix = selfSand.garnitures[_oldCode].prix;
        console.log(_oldPrix)
        delete selfSand.garnitures[_oldCode]
        selfSand.prix = selfSand.prix - _oldPrix;
    }
    //*--
    selfSand.removeGarniture = function(_garniture){

        if (_garniture.code.toString() in self.garnitures) {
            self.garnitures[_garniture.code].quantite--;
            if(self.garnitures[_garniture.code].quatite == 0) {
                delete selfSand.garnitures[_garniture.code];
            }
        }

        self.prix = self.prix - _garniture.prix;
    }
    //*--
    selfSand.removeGarniture2 = function(_code, _qte){

        var _prixToRm = selfSand.garnitures[_code].prix; // prix du sand qui a le code a retirer

        if (_code.toString() in selfSand.garnitures) {
            selfSand.garnitures[_code].quantite = selfSand.garnitures[_code].quantite - _qte;

            if(selfSand.garnitures[_code].quantite === 0) {

                delete selfSand.garnitures[_code];
            }
        }

        selfSand.prix = selfSand.prix - _prixToRm;
    }
    //*--
    selfSand.changePain = function(_pain){
        var _oldPainPrix = selfSand.pain.prix;

        selfSand.pain = _pain;
        selfSand.prix = selfSand.prix + _pain.prix - _oldPainPrix;
    }


    selfSand.init();
}

//---------------------

//---------------------

//-----------------------
var  rowPainCr = function(_pains) {

    var str = '';
    _pains.forEach(function(e){
        str = str + '<option value="' + e.id + '">' + e.nom + '</option>';
    });

    return '<tr>' +
                '<td class="id-pain" hidden></td>' +
                '<td class="quantie-pain">1</td>' +
                '<td class="nom-pain">' +
                    '<select class="form-control" onchange="app.painEventCr(this.parentNode.parentNode)" >' +

        str

        + '</select>' +
                '</td>' +
                '<td class="prix-pain" ><span>' + _pains[0].prix + '</span><span> €</span></td>' +
                '<td class="img-pain" >' +
                    '<img src="img/picture.svg" alt="img pain" class="img-circle">' +
                '</td>' +
                '<td></td>' +
            '</tr>'
        ;
};


var  rowGarnitureCr = function(_garnitures) {

    var str = '';
    var _id1 = 0;
    var _id2 = 0;
    var matchOne = false;

    _garnitures.forEach(function(e){

        if(!e.crSelected && !matchOne){
            str = str + '<option value="'+ e.id +'" selected >' + e.nom + '</option>'
            matchOne = true;
            e.crSelected = true;
            _id2 = _id1;
            app.crCurrentIndex = _id2;
        }
        else {
            str = str + '<option value="'+ e.id + '">' + e.nom + '</option>';
        }
        _id1++;
    });

    return '<tr>'+
                '<td class="id-garniture" hidden></td>'+
                '<td class="quantie-garniture">'+
                    '<input class="form-control" type="number" min="1" value="1" onchange="app.qteEventCr(this.parentNode.parentNode)" >'+
                '</td>'+
                '<td class="nom-garniture">'+
                    '<select class="form-control" onFocus="app.garniFocusEventCr(this)" onchange="app.garniEventCr(this.parentNode.parentNode)">' +

        str

        + '</select>' +
                '</td>' +
                '<td class="prix-garniture" ><span>' + _garnitures[_id2].prix + '</span><span> €</span></td>' +
                '<td class="img-garniture" > -- </td>' +
                '<td class="remove-garniture">' +
                    '<button class="btn btn-warning" type="button" onclick="app.crRemoveRow(this.parentNode.parentNode)">' +
                        '<span class="glyphicon glyphicon-remove"></span> Retirer' +
                    '</button>' +
                '</td>' +
            '</tr>'
        ;
};

//this.parentNode.parentNode.cells[0].innerHTML
app = new Object();

app.hostpath = "http://" + document.location.hostname + "/api/";
console.log(app.hostpath)
// app.hostpath = "http://sandwicheriexfs.local/api/";
app.menus = null;
app.garnitures = null;
app.pains = null;
app.pain1 = null;
app.garniture1 = null;

//app.nonSelectIdGarn = [];


app.sandwichCr = null;      // sandwich a creer

app.crRowPain = null;
app.crRowGarniture = null;
app.crMaxRow = 10;
app.crNumbreRow = 0;
app.crCurrentIndex = 0;
app.crGarnitureSelectFocus = null;

app.catSandwichs = null;
app.panier = [];


app.garnituresList = null; // pas encore utilise
// mise à jour de la liste de garnitures dans Cr
app.garnituresUpdate = function(){
    app.garnituresList;
}
//retire un ligne garniture dans modal creer sandwich
app.crRemoveRow = function(_d) {

    var _qte = _d.children[1].children[0].value  ;
    var _code = _d.children[2].children[0].value  ;

    app.garnituresList.find(function(e){ return e.id == _code ; }) .crSelected = false;
    app.sandwichCr.removeGarniture2(_code, _qte)

    $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );
    $(_d).remove()
}
// event lorsque la qte change dans l input
app.qteEventCr = function(_d){
    var _qte = _d.children[1].children[0].value  ;
    var _code = _d.children[2].children[0].value  ;


    app.sandwichCr.updateGarniture1(_code, _qte);

    $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );

}
app.garniFocusEventCr = function(_e) {
    app.crGarnitureSelectFocus = _e.value;
    _e.blur();
}
app.garniEventCr = function(_d){
    var _qte = 1  ;
    var _code = _d.children[2].children[0].value  ;

    //verifi si le _code correspond a un selected de garniturelist
    if(app.garnituresList.find(function(e){ return e.id == _code; }) .crSelected ) {

        _d.children[2].children[0].value = app.crGarnitureSelectFocus;
        _d.children[2].children[0].blur();
        app.sandwichCr.updateGarniture2(app.crGarnitureSelectFocus)

    } else {

        app.garnituresList.find(function(e){ return e.id ==  app.crGarnitureSelectFocus ; }) .crSelected = false;
        app.garnituresList.find(function(e){ return e.id ==  _code ; }) .crSelected = true;
        _d.children[2].children[0].blur();
        var _id = app.garnituresList.findIndex(function(e){ return e.id ==  _code ; })
        var _newGarn = new Garniture(app.garnituresList[_id].id, app.garnituresList[_id].nom, app.garnituresList[_id].prix, app.garnituresList[_id].typeGarniture.nom)
        app.sandwichCr.addGarniture(_newGarn, _code)
        app.sandwichCr.updateGarniture3(app.crGarnitureSelectFocus)

        _d.children[3].children[0].innerHTML = _newGarn.prix.toFixed(2)

    }

    $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );
    _d.children[1].children[0].value = _qte;

}
app.painEventCr = function(_e) {
    var _code = _e.children[2].children[0].value;

    var _id = app.pains.findIndex(function(e){ return e.id ==  _code ; })
    var _newPain = new Pain(app.pains[_id].id, app.pains[_id].nom, app.pains[_id].prix, app.pains[_id].image)

    app.sandwichCr.changePain(_newPain)

    _e.children[3].children[0].innerHTML = app.sandwichCr.pain.prix.toFixed(2)
    $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );

}

app.domInit = function() {


    $('.modal-sandwich-creer2 .sandwich tbody').append( app.crRowPain );
    $('.modal-sandwich-creer2 .sandwich tbody').append( app.crRowGarniture);

    $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );

    //array.splice(id, 1) retire 1 elt situé a l indice id => return ce qui a ete retirer
//    app.garnituresList.splice(  app.garnituresList.findIndex(function(e){return e.id == app.garnitures[0].id}), 1 );

    $('.modal-sandwich-creer2 .modal-footer').removeAttr('hidden') // fait apparaitre les button dans la modal create

}

app.start = function(){
    //Get Menus
    $.get( app.hostpath+"menus", function() {
        console.log( "success" );
    })
        .done(function(data) {
            console.log( "second success" );
            app.menus = data;

            //Get Garniture
            $.get( app.hostpath+"garnitures", function() {
                console.log( "success" );
            })
                .done(function(data) {
                    console.log( "second success" );
                    app.garnitures = data;  // Les Garnitures

                    app.garnituresList = app.garnitures.map(function(x){
                            x.crSelected = false;
                            return x;
                        }
                    ); // creer un nouveau tb


                    //Get pains
                    $.get( app.hostpath+"pains", function() {
                        console.log( "success" );
                    })
                        .done(function(data) {

                            console.log( "second success" );

                            app.pains = data;           // Les Pains

                            app.crRowPain = rowPainCr(app.pains);  // Ligne html pain cree
                            app.crNumbreRow++;
                            app.crRowGarniture = rowGarnitureCr(app.garnituresList); // Ligne html garniture cree
//                            app.crRowGarniture = rowGarnitureCr(app.garnituresList, app.garnituresList[0].id); // Ligne html garniture cree
                            app.crNumbreRow++;


                            app.pain1 = new Pain(app.pains[0].id, app.pains[0].nom, app.pains[0].prix, app.pains[0].image);
                            app.garniture1 = new Garniture(app.garnitures[0].id, app.garnitures[0].nom, app.garnitures[0].prix, app.garnitures[0].typeGarniture.nom );

                            app.sandwichCr = new Sandwich(app.pain1, null, app.garniture1);  // instance sandwich cree a la base

                            app.domInit()
                        })
                        .fail(function() {
                            console.log( "error" );
                        })
                        .always(function() {
                            console.log( "finished" );
                        });
                })
                .fail(function() {
                    console.log( "error" );
                })
                .always(function() {
                    console.log( "finished" );
                });

        })
        .fail(function() {
            console.log( "error" );
        })
        .always(function() {
            console.log( "finished" );
        });


    // sandwich du catalogue
        var _idCatalogue = $('.id-catalogue')[0].textContent;

    $.get( app.hostpath+"menus/"+_idCatalogue.toString()+"/sandwichs", function() {
        console.log( "success==" );
    })
        .done(function(data) {
            console.log( "second success===========" );
            app.catSandwichs = data;
            $('.sandwich-catalogue .badge.add-sandwich').removeClass('elt-hidden')


        })
        .fail(function() {
            console.log( "error" );
        })
        .always(function() {
            console.log( "finished" );
        });


}
app.start();

$('button[data-target=".modal-sandwich-creer2"]').click(function(){
    console.log("yep")

});


//ajouter un ingredient dans vue creer sandwich
$('.modal-sandwich-creer2 .add-garniture').click(function(){

    if(app.crNumbreRow < app.crMaxRow){

        app.crRowGarniture = rowGarnitureCr(app.garnituresList);
        app.crNumbreRow++;


        $('.modal-sandwich-creer2 .sandwich tbody').append( app.crRowGarniture );// Quand tu fais un append ligne garn tu dois retirer le premier elt garn de garnList


        var currentGarniture = new Garniture(
            app.garnitures[app.crCurrentIndex].id, app.garnitures[app.crCurrentIndex].nom,
            app.garnitures[app.crCurrentIndex].prix, app.garnitures[app.crCurrentIndex].typeGarniture.nom );
        app.sandwichCr.addGarniture(currentGarniture, currentGarniture.code);

        $('.modal-sandwich-creer2 .sandwich .prix-total').text( app.sandwichCr.prix.toFixed(2) );
    }
});



//ajouter un ingredient dans vue creer sandwich
$('.modal-sandwich-creer2 .save-garniture').click(function(){

    $( ".modal-sandwich-creer2 .cancel-garniture" ).trigger( "click" )
    if(true){

        alert("sandwich is save" + "\n" + "sandwich:  "+ app.sandwichCr.prix)
    }
});

$('.sandwich-catalogue .add-sandwich').click(function (event) {
    event.preventDefault();
   var _idsand = this.parentNode.parentNode.childNodes[1].childNodes[1].textContent;
            console.log(this.parentNode.parentNode.childNodes[1].childNodes[1])
          console.log(app.catSandwichs[_idsand])

            // app.catSandwich = null;
            // var _catSand1 = new Object();
            // _catSand1.all = data;
            // _catSand1.nom = data.nom;
            // _catSand1.id = data.id;
            // _catSand1.prix = data.pain.prix;
            // data.garnituresSandwich.forEach(function(element) {
            //
            //     _catSand1.prix = _catSand1.prix + ( element.quantite * (element.garniture.prix) );
            //
            // });
            // app.catSandwich = _catSand1;


})



