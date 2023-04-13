document.getElementById("new-arr").onclick = function () {
    document.getElementById("row-fe").style.display = "none";
    document.getElementById("row-new-arr").style.display = "block";
    document.getElementById("row-on").style.display = "none";
   
    document.getElementById("featured").style.color = "#222";
    document.getElementById("new-arr").style.color = "#70b100";
    document.getElementById("on-sale").style.color = "#222";
    const swiper71 = new Swiper(".slider-71",{
        loop:true,
        grapbCursor: true,
        spaceBetween: 60,
        navigation:{
            nextEl: ".fno-next",
            prevEl: ".fno-prev",
        },
        breakpoints:{
            640:{
                slidesPerView:2,
            },
            768:{
                slidesPerView:3,
            },
            1024:{
                slidesPerView:4,
            },
        },
    
    });
}

document.getElementById("on-sale").onclick = function () {
    document.getElementById("row-fe").style.display = "none";
    document.getElementById("row-new-arr").style.display = "none";
    document.getElementById("row-on").style.display = "block";

    document.getElementById("featured").style.color = "#222";
    document.getElementById("new-arr").style.color = "#222";
    document.getElementById("on-sale").style.color = "#70b100";
   
    const swiper72 = new Swiper(".slider-72",{
        loop:true,
        grapbCursor: true,
        spaceBetween: 60,
        navigation:{
            nextEl: ".fno-next",
            prevEl: ".fno-prev",
        },
        breakpoints:{
            640:{
                slidesPerView:2,
            },
            768:{
                slidesPerView:3,
            },
            1024:{
                slidesPerView:4,
            },
        },
    
    });
}

document.getElementById("featured").onclick = function () {
    document.getElementById("row-fe").style.display = "block";
    document.getElementById("row-new-arr").style.display = "none";
    document.getElementById("row-on").style.display = "none";

    document.getElementById("featured").style.color = "#70b100";
    document.getElementById("new-arr").style.color = "#222";
    document.getElementById("on-sale").style.color = "#222";
   
    const swiper7 = new Swiper(".slider-7",{
        loop:true,
        grapbCursor: true,
        spaceBetween: 60,
        navigation:{
            nextEl: ".fno-next",
            prevEl: ".fno-prev",
        },
        breakpoints:{
            640:{
                slidesPerView:2,
            },
            768:{
                slidesPerView:3,
            },
            1024:{
                slidesPerView:4,
            },
        },
    
    });
}

const swiper2 = new Swiper(".slider-2",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 20,
    navigation:{
        nextEl: ".custom-next",
        prevEl: ".custom-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});

const swiper3 = new Swiper(".slider-3",{
    loop:true,
    grapbCursor: true,
    autoplay:{
        delay:3000,
        disableOnInteraction:false,
    },
    spaceBetween: 30,
    slidesPerView:2,
    navigation:{
        nextEl: ".brand-next",
        prevEl: ".brand-prev",
    },
    breakpoints:{
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:5,
        },
    },

});

const swiper4 = new Swiper(".slider-4",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 0,
    navigation:{
        nextEl: ".categories-next",
        prevEl: ".categories-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:3,
        },
        768:{
            slidesPerView:4,
        },
        1024:{
            slidesPerView:6,
        },
    },
    
});

const swiper5 = new Swiper(".slider-5",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".seller-next",
        prevEl: ".seller-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        },
    },

});

const swiper6 = new Swiper(".slider-6",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".news-next",
        prevEl: ".news-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        },
    },

});

const swiper7 = new Swiper(".slider-7",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".fno-next",
        prevEl: ".fno-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});

const swiper71 = new Swiper(".slider-71",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".fno-next",
        prevEl: ".fno-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});
const swiper72 = new Swiper(".slider-72",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".fno-next",
        prevEl: ".fno-prev",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});
const swiper8 = new Swiper(".slider-8",{
  
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".fno-next1",
        prevEl: ".fno-prev1",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});

const swiper9 = new Swiper(".slider-9",{
    loop:true,
    grapbCursor: true,
    spaceBetween: 60,
    navigation:{
        nextEl: ".fno-next2",
        prevEl: ".fno-prev3",
    },
    breakpoints:{
        640:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
    },

});


const swiper10 = new Swiper(".slider-10",{
    autoplay:{
        delay:4000,
        disableOnInteraction: false,
    },
    grapbCursor:true,
    effect: 'fade',
    loop:true,
    navigation:{
        nextEl: ".swiper-next",
        prevEl: ".swiper-prev",
    },
    
});