const imgBtn = document.querySelector('#js-buton')
    const modal = document.querySelector('.js-modal')
    const mdcs =document.querySelector('.js-mdcs')

    function showModal(){
        modal.classList.add('open')
    }
        
    function cloesModal(){
        modal.classList.remove('open')
    }
    imgBtn.addEventListener('click', showModal)
        
    modal.addEventListener('click', cloesModal)
    mdcs.addEventListener('click', function(event){
    event.stopPropagation()
        })