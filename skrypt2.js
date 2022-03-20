pytania=0
fetch("pytania.json")
.then( e => e.json())
.then(e => pytania=e.length)
.then( e => {
    ustal()
})

function ustal() {
    document.querySelectorAll(".ile").forEach(e => {
        e.innerHTML=pytania
    })
}