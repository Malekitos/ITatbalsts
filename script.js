let modalBtns = document.querySelectorAll('[data-target]')
let closeModal = document.querySelectorAll('.close-model')

modalBtns.forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelector(btn.dataset.target).classList.add('modal-active')
    })
})

closeModal.forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelector(btn.dataset.target).classList.remove('modal-active')
    })
})