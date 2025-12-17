const delBtn = document.getElementById('delBtn')
const cancelBtn = document.getElementById('cancelBtn')
const modalMask = document.getElementById('modal-mask')

delBtn.addEventListener('click', () =>{
    modalMask.classList.remove('hidden')
    modalMask.classList.add("flex")
})

cancelBtn.addEventListener('click', () =>{
    modalMask.classList.add('hidden')
    modalMask.classList.remove('flex')
})