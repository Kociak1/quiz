const numer = document.querySelector("#numer")
const counter = document.querySelector("#counter")
const tresc = document.querySelector("#tresc")
const opd = document.querySelector("#opd")
const tp1 = document.querySelector("#tp1")
const tp2 = document.querySelector("#tr")
const modal = document.querySelector("#modal")
const setName = document.querySelector("#setName")
modal.showModal()
let pytania;
let poprawna
let punkty
const wylosowane =[]
let len 
kolejka =[]
let index=0;
let imie
punkty =0
dobre=0
time=0
stopTime=true
fetch("pytania.json")
.then( e => e.json())
.then(e =>{
    pytania=e
    len= e.length
} )
/*.then(e => {
    
})*/

function losuj() {
    for(i=0;i<len;i++) {
        kolejka.push(i);
    }
    kolejka.sort( () => .5 - Math.random() )
}

function startGame() {
    losuj()
    clear()
    render()
    AOS.init();
}
setName.addEventListener("click", () => {
    imie=document.querySelector("#imie").value
    reg = /^[ ]{1,}$/
    console.log(imie.length)
    if(imie.length < 3 || reg.test(imie)) {
        document.querySelector("#coment").innerHTML=`wprowadź nick`
    } 
    if(imie!="" && imie!=null && !reg.test(imie)) {
        modal.close()
    modal.classList.add("hide")
    startGame()
    }
    
})
function render() {
    delay=1
numer.innerHTML=`${index+1}/${len}`
const el2 = document.importNode(tp2.content,true)
const vv = el2.querySelector('span').innerHTML=`${pytania[index].pytanie}`
tresc.appendChild(el2)
pytania[index].odpowiedzi.forEach(element => {
    const el = document.importNode(tp1.content,true)
    const txt=el.querySelector('input')
    txt.dataset.aosDelay=200*delay++
    txt.value=element
   txt.addEventListener("click",e => {
       stopTime=true
        if(txt.value == pytania[index].poprawna) {
            txt.classList.add("correct")
            punkty+= 1000*(60-time)/60
            dobre++
        } else {
            txt.classList.add("wrong")
        }
        opd.querySelectorAll("input").forEach(e => {
            e.disabled=true
        })
        if(++index<len) {
            setTimeout(() => {
                clear()
                render()
            },1400)
        } else {
            document.querySelector("#uname").value=imie
            document.querySelector("#punkty").value=Math.round(punkty,2)
            document.querySelector("#poprawne").value=dobre
            document.querySelector("#frm").submit()


        }
    })
    opd.appendChild(el)
});
AOS.refresh();

}

function clear() {
    while(opd.firstChild)  opd.firstChild.remove()
    while(tresc.firstChild)  tresc.firstChild.remove()
    stopTime=false
    time=0
}

setInterval(() => {
if(!stopTime) {    
counter.innerHTML=`${60 - ++time}s`

if(time>=60 && index < len-1) {
    
    index++;
    clear()
    render()
}
if(time>=60 && index == len-1) {
    document.querySelector("#uname").value=imie
    document.querySelector("#punkty").value=Math.round(punkty,2)
    document.querySelector("#poprawne").value=dobre
    document.querySelector("#frm").submit()
}
}
},1000)
