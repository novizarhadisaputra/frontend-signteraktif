document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth > 992) {
    
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
    
            everyitem.addEventListener('mouseover', function(e){
    
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    el_link.setAttribute("aria-expanded", "true");
                    nextEl.classList.add('show');
                    nextEl.setAttribute("data-bs-popper", "none");
                }
    
            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    el_link.setAttribute("aria-expanded", "false");
                    nextEl.classList.remove('show');
                    nextEl.removeAttribute("data-bs-popper", "none");
                }
    
    
            })
        });
    
    }
    // end if innerWidth
    }); 
    // DOMContentLoaded  end