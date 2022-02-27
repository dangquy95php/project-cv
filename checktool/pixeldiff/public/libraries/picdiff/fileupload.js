/**
 * @dangquy check pixel image
 * Upload file and screenshot from url
 * ScreenShot on Chrome, Firefox, Webkit
 * 01/08/2020
 * */
window.URL = window.URL || window.webkitURL;


let file_design = document.getElementById('img0_chrome');

if (file_design) {
    file_design = file_design.getAttribute('src');
}

/////////////////////////// Tab CHROME //////////////////////
if (file_design) {
    var posX_chrome;
    var posY_chrome;
    // var target;
    var _imgchrome = '';
    var _fileList_chrome = document.getElementById('fileList_chrome');
    var scrY_chrome=1000;
    
    var fileList_chrome = document.getElementById("fileList_chrome"),
      bodyElemChrome = document.body;
    
    function handleChromeAndChrome() {
        var chrome_and_design = document.querySelectorAll('.chrome_and_design li img');
    
        fileList_chrome.innerHTML = "";
        var list = document.createElement("ul");
        list.className = 'chrome_and_design';
        fileList_chrome.appendChild(list);
        
        for (var i = 0; i < 2; i++) {
            var li = document.createElement("li");
            list.appendChild(li);
    
            var img = document.createElement("img");
            img.src = chrome_and_design[i].getAttribute('src'); //||window.URL.createObjectURL(files[i]);
           
            img.draggable = false;
            img.onmousedown = mdown_chrome;
            img.onmouseup = mup_chrome;
            img.ontouchstart = tdown_chrome;
            img.ontouchend = tup_chrome;
            img.setAttribute('id', 'img' + i + '_chrome');
            img.onload = function() {
                window.URL.revokeObjectURL(this.src);
            }
            li.appendChild(img);
        }
            
        _imgchrome=document.getElementById('img1_chrome');
    }
    
    handleChromeAndChrome();
    
    _fileList_chrome.addEventListener("mouseover",function(){
        document.body.style.overflowY="hidden";
    });
    _fileList_chrome.addEventListener("mouseout",function(){
        document.body.style.overflowY="auto";
    });
    
    
    // _fileList_chrome.addEventListener("wheel", function(e) {
    //     scrY_chrome+=Math.floor(e.deltaY);
    //     _imgchrome.style.transform="scale("+scrY_chrome*0.001 +")";
    //     // console.log(scrY,e.deltaY );
    // });
    
    
    try {
        
        keyboardJS.bind('shift+alt+up', function(e) {
            _imgchrome.style.top=(_imgchrome.offsetTop - 10)+ "px";
        });
    
        keyboardJS.bind('shift+alt+down', function(e) {
            _imgchrome.style.top=(_imgchrome.offsetTop + 10)+ "px";
        });
    
        keyboardJS.bind('shift+alt+left', function(e) {
            _imgchrome.style.left=(_imgchrome.offsetLeft - 10)+ "px";
        });
    
        keyboardJS.bind('shift+alt+right', function(e) {
            _imgchrome.style.left=(_imgchrome.offsetLeft + 10)+ "px";
        });
    
        keyboardJS.bind('shift+up', function(e) {
            _imgchrome.style.top=(_imgchrome.offsetTop - 1)+ "px";
        });
    
        keyboardJS.bind('shift+down', function(e) {
            _imgchrome.style.top=(_imgchrome.offsetTop + 1)+ "px";
        });
    
        keyboardJS.bind('shift+left', function(e) {
            _imgchrome.style.left=(_imgchrome.offsetLeft - 1)+ "px";
        });
    
        keyboardJS.bind('shift+right', function(e) {
            _imgchrome.style.left=(_imgchrome.offsetLeft + 1)+ "px";
        });
    
    } catch (error) {
        
    }
    
    
    function mdown_chrome(e) {
        // target = document.getElementById('img1');
        posY_chrome = e.clientY - _imgchrome.offsetTop;
        posX_chrome = e.clientX - _imgchrome.offsetLeft;
        document.addEventListener('mousemove', dragging_chrome, true);
    }
    
    function mup_chrome(e) {
        document.removeEventListener('mousemove', dragging_chrome, true);
    }
    
    function tdown_chrome(e) {
        if (e.targetTouches.length == 1) {
            var touch = event.targetTouches[0];
            // _img1 = document.getElementById('img1');
            posY_chrome = touch.clientY - _imgchrome.offsetTop;
            posX_chrome = touch.clientX - _imgchrome.offsetLeft;
            document.addEventListener('touchmove', tmove_chrome, true);
        }
    
    }
    
    function tup_chrome(e) {
        document.removeEventListener('touchmove', tmove_chrome, true);
    }
    
    function tmove_webkit(e) {
        if (e.targetTouches.length == 1) {
            var touch = event.targetTouches[0];
            // Place element where the finger is
            // target = document.getElementById('img1');
    
            _imgchrome.style.left = (touch.clientX - posX_chrome) + 'px';
            _imgchrome.style.top = (touch.clientY - posY_chrome) + 'px';
        }
    }
    
    function dragging_chrome(e) {
    
        // target = document.getElementById('img1');
    
        _imgchrome.style.top = (e.clientY - posY_chrome) + "px";
        _imgchrome.style.left = (e.clientX - posX_chrome) + "px";
    }
}

/////////////////////////// End Tab CHROME //////////////////////

/////////////////////////// Tab Firefox //////////////////////

var posX_firefox;
var posY_firefox;
// var target;
var _img1=document.getElementById('img1');
var _fileList=document.getElementById('fileList');
var scrY_chrome=1000;

var  fileList = document.getElementById("fileList"),
  bodyElemChrome = document.body;


handleChromeAndFirefox();

_fileList.addEventListener("mouseover",function(){
    document.body.style.overflowY="hidden";
});
_fileList.addEventListener("mouseout",function(){
    document.body.style.overflowY="auto";
});


// _fileList.addEventListener("wheel", function(e) {
//     scrY_chrome+=Math.floor(e.deltaY);
//     _img1.style.transform="scale("+scrY_chrome*0.001 +")";
//     // console.log(scrY,e.deltaY );
// });


try {
    
    keyboardJS.bind('shift+alt+up', function(e) {
        _img1.style.top=(_img1.offsetTop - 10)+ "px";
    });

    keyboardJS.bind('shift+alt+down', function(e) {
        _img1.style.top=(_img1.offsetTop + 10)+ "px";
    });

    keyboardJS.bind('shift+alt+left', function(e) {
        _img1.style.left=(_img1.offsetLeft - 10)+ "px";
    });

    keyboardJS.bind('shift+alt+right', function(e) {
        _img1.style.left=(_img1.offsetLeft + 10)+ "px";
    });

    keyboardJS.bind('shift+up', function(e) {
        _img1.style.top=(_img1.offsetTop - 1)+ "px";
    });

    keyboardJS.bind('shift+down', function(e) {
        _img1.style.top=(_img1.offsetTop + 1)+ "px";
    });

    keyboardJS.bind('shift+left', function(e) {
        _img1.style.left=(_img1.offsetLeft - 1)+ "px";
    });

    keyboardJS.bind('shift+right', function(e) {
        _img1.style.left=(_img1.offsetLeft + 1)+ "px";
    });

} catch (error) {
    

}

function handleChromeAndFirefox() {
    var chrome_and_firefox = document.querySelectorAll('.chrome_and_firefox li img');

    fileList.innerHTML = "";
    var list = document.createElement("ul");
    list.className = 'chrome_and_firefox';
    fileList.appendChild(list);
    
    for (var i = 0; i < 2; i++) {
        var li = document.createElement("li");
        list.appendChild(li);

        // thumbElem[i].src=imgsrc||window.URL.createObjectURL(files[i]);
        var img = document.createElement("img");
        img.src = chrome_and_firefox[i].getAttribute('src'); //||window.URL.createObjectURL(files[i]);
        if (file_design && i == 0) {
            img.src = file_design;
        }
        img.draggable = false;
        img.onmousedown = mdown;
        img.onmouseup = mup;
        img.ontouchstart = tdown;
        img.ontouchend = tup;
        img.setAttribute('id', 'img' + i);

        img.onload = function() {
            window.URL.revokeObjectURL(this.src);
        }

        li.appendChild(img);
    }
        
   _img1=document.getElementById('img1');
}


function mdown(e) {
    // target = document.getElementById('img1');
    posY_firefox = e.clientY - _img1.offsetTop;
    posX_firefox = e.clientX - _img1.offsetLeft;
    document.addEventListener('mousemove', dragging, true);
}

function mup(e) {
    document.removeEventListener('mousemove', dragging, true);
}

function tdown(e) {
    if (e.targetTouches.length == 1) {
        var touch = event.targetTouches[0];
        // _img1 = document.getElementById('img1');
        posY_firefox = touch.clientY - _img1.offsetTop;
        posX_firefox = touch.clientX - _img1.offsetLeft;
        document.addEventListener('touchmove', tmove, true);
    }

}

function tup(e) {
    document.removeEventListener('touchmove', tmove, true);
}

function tmove(e) {
    if (e.targetTouches.length == 1) {
        var touch = event.targetTouches[0];
        // Place element where the finger is
        // target = document.getElementById('img1');

        _img1.style.left = (touch.clientX - posX_firefox) + 'px';
        _img1.style.top = (touch.clientY - posY_firefox) + 'px';
    }
}

function dragging(e) {

    // target = document.getElementById('img1');

    _img1.style.top = (e.clientY - posY_firefox) + "px";
    _img1.style.left = (e.clientX - posX_firefox) + "px";
}

/////////////////////////// End Tab Firefox //////////////////////


/////////////////////////// Tab Webkit //////////////////////

var posX_webkit;
var posY_webkit;
// var target;
var _img2 = document.getElementById('img2');
var _fileList_webkit = document.getElementById('fileList_webkit');
var scrY_webkit=1000;

// fileSelect = document.getElementById("fileSelect"),
var fileList_webkit = document.getElementById("fileList_webkit"),
//   thumbElem = document.querySelectorAll(".thumb_img"),
  bodyElemWebkit = document.body;

function handleChromeAndWebkit() {
    var chrome_and_webkit = document.querySelectorAll('.chrome_and_webkit li img');

    fileList_webkit.innerHTML = "";
    var list = document.createElement("ul");
    list.className = 'chrome_and_webkit';
    fileList_webkit.appendChild(list);
    
    for (var i = 0; i < 2; i++) {
        var li = document.createElement("li");
        list.appendChild(li);

        // thumbElem[i].src=imgsrc||window.URL.createObjectURL(files[i]);
        var img = document.createElement("img");
        img.src = chrome_and_webkit[i].getAttribute('src'); //||window.URL.createObjectURL(files[i]);
        if (file_design && i == 0) {
            img.src = file_design;
        }
        img.draggable = false;
        img.onmousedown = mdown_webkit;
        img.onmouseup = mup_webkit;
        img.ontouchstart = tdown_webkit;
        img.ontouchend = tup_webkit;
        img.setAttribute('id', 'img' + i + '_webkit');
        img.onload = function() {
            window.URL.revokeObjectURL(this.src);
        }
        li.appendChild(img);
    }
        
   _img2=document.getElementById('img1_webkit');
}

handleChromeAndWebkit();

_fileList_webkit.addEventListener("mouseover",function(){
    document.body.style.overflowY="hidden";
});
_fileList_webkit.addEventListener("mouseout",function(){
    document.body.style.overflowY="auto";
});


// _fileList_webkit.addEventListener("wheel", function(e) {
//     scrY_webkit+=Math.floor(e.deltaY);
//     _img2.style.transform="scale("+scrY_webkit*0.001 +")";
//     // console.log(scrY,e.deltaY );
// });


try {
    
    keyboardJS.bind('shift+alt+up', function(e) {
        _img2.style.top=(_img2.offsetTop - 10)+ "px";
    });

    keyboardJS.bind('shift+alt+down', function(e) {
        _img2.style.top=(_img2.offsetTop + 10)+ "px";
    });

    keyboardJS.bind('shift+alt+left', function(e) {
        _img2.style.left=(_img2.offsetLeft - 10)+ "px";
    });

    keyboardJS.bind('shift+alt+right', function(e) {
        _img2.style.left=(_img2.offsetLeft + 10)+ "px";
    });

    keyboardJS.bind('shift+up', function(e) {
        _img2.style.top=(_img2.offsetTop - 1)+ "px";
    });

    keyboardJS.bind('shift+down', function(e) {
        _img2.style.top=(_img2.offsetTop + 1)+ "px";
    });

    keyboardJS.bind('shift+left', function(e) {
        _img2.style.left=(_img2.offsetLeft - 1)+ "px";
    });

    keyboardJS.bind('shift+right', function(e) {
        _img2.style.left=(_img2.offsetLeft + 1)+ "px";
    });

} catch (error) {
    
}


function mdown_webkit(e) {
    // target = document.getElementById('img1');
    posY_webkit = e.clientY - _img2.offsetTop;
    posX_webkit = e.clientX - _img2.offsetLeft;
    document.addEventListener('mousemove', dragging_webkit, true);
}

function mup_webkit(e) {
    document.removeEventListener('mousemove', dragging_webkit, true);
}

function tdown_webkit(e) {
    if (e.targetTouches.length == 1) {
        var touch = event.targetTouches[0];
        // _img1 = document.getElementById('img1');
        posY_webkit = touch.clientY - _img2.offsetTop;
        posX_webkit = touch.clientX - _img2.offsetLeft;
        document.addEventListener('touchmove', tmove_webkit, true);
    }

}

function tup_webkit(e) {
    document.removeEventListener('touchmove', tmove_webkit, true);
}

function tmove_webkit(e) {
    if (e.targetTouches.length == 1) {
        var touch = event.targetTouches[0];
        // Place element where the finger is
        // target = document.getElementById('img1');

        _img2.style.left = (touch.clientX - posX_webkit) + 'px';
        _img2.style.top = (touch.clientY - posY_webkit) + 'px';
    }
}

function dragging_webkit(e) {

    // target = document.getElementById('img1');

    _img2.style.top = (e.clientY - posY_webkit) + "px";
    _img2.style.left = (e.clientX - posX_webkit) + "px";
}

/////////////////////////// End Tab Webkit //////////////////////


let file_design_ie = document.getElementById('img0_ie');
/////////////////////////// Tab IE //////////////////////
if (file_design_ie) {
    var posX_ie;
    var posY_ie;
    // var target;
    var _img3 = document.getElementById('img3');
    var _fileList_ie = document.getElementById('fileList_ie');
    var scrY_ie=1000;

    // fileSelect = document.getElementById("fileSelect"),
    var fileList_ie = document.getElementById("fileList_ie"),
    //   thumbElem = document.querySelectorAll(".thumb_img"),
    bodyElemie = document.body;

    function handleChromeAndie() {
        var chrome_and_ie = document.querySelectorAll('.chrome_and_ie li img');

        fileList_ie.innerHTML = "";
        var list = document.createElement("ul");
        list.className = 'chrome_and_ie';
        fileList_ie.appendChild(list);
        
        for (var i = 0; i < 2; i++) {
            var li = document.createElement("li");
            list.appendChild(li);

            // thumbElem[i].src=imgsrc||window.URL.createObjectURL(files[i]);
            var img = document.createElement("img");
            img.src = chrome_and_ie[i].getAttribute('src'); //||window.URL.createObjectURL(files[i]);
            if (file_design && i == 0) {
                img.src = file_design;
            }
            img.draggable = false;
            img.onmousedown = mdown_ie;
            img.onmouseup = mup_ie;
            img.ontouchstart = tdown_ie;
            img.ontouchend = tup_ie;
            img.setAttribute('id', 'img' + i + '_ie');
            img.onload = function() {
                window.URL.revokeObjectURL(this.src);
            }
            li.appendChild(img);
        }
            
    _img3=document.getElementById('img1_ie');
    }

    handleChromeAndie();

    _fileList_ie.addEventListener("mouseover",function(){
        document.body.style.overflowY="hidden";
    });
    _fileList_ie.addEventListener("mouseout",function(){
        document.body.style.overflowY="auto";
    });


    // _fileList_ie.addEventListener("wheel", function(e) {
    //     scrY_ie+=Math.floor(e.deltaY);
    //     _img3.style.transform="scale("+scrY_ie*0.001 +")";
    //     // console.log(scrY,e.deltaY );
    // });


    try {
        
        keyboardJS.bind('shift+alt+up', function(e) {
            _img3.style.top=(_img3.offsetTop - 10)+ "px";
        });

        keyboardJS.bind('shift+alt+down', function(e) {
            _img3.style.top=(_img3.offsetTop + 10)+ "px";
        });

        keyboardJS.bind('shift+alt+left', function(e) {
            _img3.style.left=(_img3.offsetLeft - 10)+ "px";
        });

        keyboardJS.bind('shift+alt+right', function(e) {
            _img3.style.left=(_img3.offsetLeft + 10)+ "px";
        });

        keyboardJS.bind('shift+up', function(e) {
            _img3.style.top=(_img3.offsetTop - 1)+ "px";
        });

        keyboardJS.bind('shift+down', function(e) {
            _img3.style.top=(_img3.offsetTop + 1)+ "px";
        });

        keyboardJS.bind('shift+left', function(e) {
            _img3.style.left=(_img3.offsetLeft - 1)+ "px";
        });

        keyboardJS.bind('shift+right', function(e) {
            _img3.style.left=(_img3.offsetLeft + 1)+ "px";
        });

    } catch (error) {
        
    }


    function mdown_ie(e) {
        // target = document.getElementById('img1');
        posY_ie = e.clientY - _img3.offsetTop;
        posX_ie = e.clientX - _img3.offsetLeft;
        document.addEventListener('mousemove', dragging_ie, true);
    }

    function mup_ie(e) {
        document.removeEventListener('mousemove', dragging_ie, true);
    }

    function tdown_ie(e) {
        if (e.targetTouches.length == 1) {
            var touch = event.targetTouches[0];
            // _img1 = document.getElementById('img1');
            posY_ie = touch.clientY - _img3.offsetTop;
            posX_ie = touch.clientX - _img3.offsetLeft;
            document.addEventListener('touchmove', tmove_ie, true);
        }

    }

    function tup_ie(e) {
        document.removeEventListener('touchmove', tmove_ie, true);
    }

    function tmove_ie(e) {
        if (e.targetTouches.length == 1) {
            var touch = event.targetTouches[0];
            // Place element where the finger is
            // target = document.getElementById('img1');

            _img3.style.left = (touch.clientX - posX_ie) + 'px';
            _img3.style.top = (touch.clientY - posY_ie) + 'px';
        }
    }

    function dragging_ie(e) {

        // target = document.getElementById('img1');

        _img3.style.top = (e.clientY - posY_ie) + "px";
        _img3.style.left = (e.clientX - posX_ie) + "px";
    }
}

/////////////////////////// End Tab Webkit //////////////////////
