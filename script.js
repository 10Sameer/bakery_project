const dropDown = document.querySelector('.drop-down')
const toggleBtn = document.querySelector('.toggle2')
const toggled = document.querySelector('.toggle2 i')

toggleBtn.onclick = function(){
    dropDown.classList.toggle('active')
    const isActive = dropDown.classList.contains('active')

    toggled.classList = isActive
    ?'fa-solid fa-x'
    :'fa-solid fa-bars'
}