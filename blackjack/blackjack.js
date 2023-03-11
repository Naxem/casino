//Actions du joueur : en fonction de sa main, le joueur peut choisir de tirer d'autres cartes, de doubler sa mise, de se séparer ("splitter") 
//deux cartes identiques pour former deux mains séparées, ou de se coucher ("surrender") pour récupérer la moitié de sa mise.
//blackjack mise * 3:2
//écrire les règles
// si la carte est déja sortie alors changé

const card_player = []
const card_croupier = []
const cardP = []
const cardC = []
let tirage = 0
let tirageC = 0
let nb_pointsP = 0
let nb_pointsC = 0
let num = 0

function start() {
    random_card(false)
    random_card(true)
    random_card(false)
    random_card(true)

    tirage = 1
    tirageC = 1

    aff_card_player(true)
    aff_card_croupier(true)

    aff_points(false)

    if((nb_pointsP == 21) && (nb_pointsC != 21)) {
        console.log("Blacjack")
    } else if ((nb_pointsP != 21) && (nb_pointsC == 21)) {
        console.log("Perdu")
    } else if ((nb_pointsP == 21) && (nb_pointsC == 21)) [
        console.log("Push")
    ]
}

function tireCard() {
    random_card(true)
    tirage++
    aff_card_player()
}

function stopCard() {
    aff_card_croupier()
}

function condition(isEnd) {
    if(isEnd) {
        if(nb_pointsC > 21) {
            //alert("Tu a gagner !")
            console.log("gagner"+nb_pointsC + "//" + nb_pointsP)
            //location.reload()
        } else if((nb_pointsC > nb_pointsP) && (nb_pointsC <= 21)) {
            //alert("Tu a perdu !")
            console.log("perdu"+ nb_pointsC + "//" + nb_pointsP)
            //location.reload()
        } else if((nb_pointsC == nb_pointsP) && (nb_pointsC > 21)) {
            //alert("égalité !")
            console.log("égalité"+nb_pointsC + "//" + nb_pointsP)
            //location.reload()
        } else if((nb_pointsC < nb_pointsP) && (nb_pointsP <= 21)) {
            //alert("Tu a gagner !")
            console.log("gagner"+nb_pointsC + "//" + nb_pointsP)
            //location.reload()
        } else if((nb_pointsC < nb_pointsP) && (nb_pointsP > 21)) {
            //alert("Tu a perdu !")
            console.log("sauter"+ nb_pointsC + "//" + nb_pointsP)
            //location.reload()
        } else {
            console.log("Une erreur est survenu : Condition non pris en charge")
            location.reload()
        }
    }
    if((nb_pointsP > 21)) {
        //alert("Tu a perdu !" + nb_pointsP)
        console.log("tu as sauter" + nb_pointsP)
        //location.reload()
    }
    if(nb_pointsP == 21) {
        //alert("Tu a gagnier !" + nb_pointsP)
        console.log("Tu as gagner" + nb_pointsP)
        //location.reload()
    }
}

function aff_points(affPC) {
    if(affPC) {
        console.log("Points du croupier : " + nb_pointsC)
        console.log("Points du player : " + nb_pointsP)
    } else {
        nb = count_points(card_croupier[1][3], false)
        nb_pointsC = nb_pointsC - nb;
        console.log(nb_pointsC = nb_pointsC - nb) // enlever quand la solution sera trouver
        console.log("Points du croupier : " + nb_pointsC  + "        " + nb)
        console.log("Points du player : " + nb_pointsP)
        nb_pointsC = nb_pointsC + nb
    }
}

function aff_card_player(isStrart) {
    let j = 0
    if(isStrart) {
        console.log("Player couleur : " + card_player[0][j] + "    //  number : " + card_player[0][j+1])
        j = j + 2
        console.log("Player couleur : " + card_player[1][j] + "    //  number : " + card_player[1][j+1])
    } else {
        for(var i = 0; i < tirage+1; i++) {
            console.log("Player couleur : " + card_player[i][j] + "   //   number : " + card_player[i][j+1])
            j = j + 2
        }
        if(nb_pointsP >= 21) {
            aff_points(false)
            condition(true)
        } else {
            aff_points(false)
            condition(false)
        }
    }
}

function aff_card_croupier(isStart) {
    let j = 0
    let end = false
    if(isStart) {
        console.log("Croupier couleur : " + card_croupier[0][j] + "    //  number : " + card_croupier[0][j+1])
        j = j + 2
        console.log("Croupier couleur : " + card_croupier[1][j] + "    //  number : " + card_croupier[1][j+1])
        //console.log("Croupier couleur : masquer " + "    //  number : masquer")
    } else {
        for(var i = 0; i < tirageC+1; i++) {
            console.log("Croupier couleur : " + card_croupier[i][j] + "    //  number : " + card_croupier[i][j+1] + "   "+ nb_pointsC)
            j = j + 2
        }
        aff_points(false)
        
        while(end = true) {
            if(nb_pointsC >= 17) {
                end = true
                break
            } else {
                tirageC++
                j = j + 2
                random_card(false)
                console.log("Croupier couleur : " + card_croupier[tirageC][j] + "    //  number : " + card_croupier[tirageC][j+1])
                aff_points(false)
            }
        }
        condition(true)
        return
    }
}

function random_card(isPlayer) {
    let card_color = Math.floor(Math.random() * 4) + 1;
    let card_number = Math.floor(Math.random() * 13) + 1

    switch(card_color) {
        case 1 :
            card_color = "coeur"
            break;
        case 2 :
            card_color = "losange"
            break;
        case 3 :
            card_color = "trefle"
            break;
        case 4 :
            card_color = "pique"
            break;
        default :
            console.log("Une erreur est survenu : ")
            throw(err)
    }
    switch(card_number) {
        case 1 :
            card_number = "as"
            break;
        case 2 :
            break;
        case 3 :
            break;
        case 4 :
            break;
        case 5 :
            break;
        case 6 :
            break;
        case 7 :
            break;
        case 8 :
            break;
        case 9 :
            break;
        case 10 :
            break;
        case 11 :
            card_number = "valet"
            break;
        case 12 :
            card_number = "dame"
            break;
        case 13 :
            card_number = "roi"
            break;
        default :
            console.log("Une erreur est survenu : ")
            throw(err)
    }
    
    if(isPlayer) {
        cardP.push(card_color)
        cardP.push(card_number)

        card_player.push(cardP)
        count_points(card_number, true)
    } else {
        cardC.push(card_color)
        cardC.push(card_number)

        card_croupier.push(cardC)
        count_points(card_number, false)
    }
}

function count_points(number_card, isP) {
    switch(number_card) {
        case "as" :
            if(isP) {
                if(nb_pointsP + 11 > 21) {num = 1} else {num = 11}
            } else {
                if(nb_pointsC + 11 > 21) {num = 1} else {num = 11}
            }
            break;
        case 2 :
            num = 2
            break;
        case 3 :
            num = 3
            break;
        case 4 :
            num = 4
            break;
        case 5 :
            num = 5
            break;
        case 6 :
            num = 6
            break;
        case 7 :
            num = 7
            break;
        case 8 :
            num = 8
            break;
        case 9 :
            num = 9
            break;
        case 10 :
            num = 10
            break;
        case "valet" :
            num = 10
            break;
        case "dame" :
            num = 10
            break;
        case "roi" :
            num = 10
            break;
        default :
            console.log("Une erreur est survenu : ")
            throw(err)
    }

    if(isP) {
        nb_pointsP = nb_pointsP + num
    } else {
        nb_pointsC = nb_pointsC + num
    }
    return num
}