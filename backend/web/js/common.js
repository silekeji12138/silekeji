$(function() {
	//下拉菜单
	$(".drop-tag").click(function(e) {
		e.stopPropagation();
		var droplist = $(this).siblings(".drop-list");
		$(".drop-list").not(droplist).hide();
		droplist.slideToggle();
	})

	$(document).click(function(e) {
		$(".drop-list").slideUp();
//		$(".side-nav.collapse .sub").hide();
		$(".side-collapse .sub").hide();
	})

	//侧边栏菜单折叠
	$(".side-nav").find(".nLi h3").click(function(e) {
		//		$(".side-nav-ul .nLi h3").removeClass("down");
		e.stopPropagation();
		var sub = $(this).siblings(".sub");
		var _this = $(this);
		if ($(this).parents(".side-nav").hasClass("side-collapse")) {
			$(".side-nav .sub").not(sub).hide(300);
			sub.fadeToggle(300);
			$(".side-nav .nLi h3").not(_this).removeClass("on");
			$(this).toggleClass("on");
		} else {
			$(".side-nav .sub").not(sub).slideUp(300);
			sub.slideToggle(300);
			$(".side-nav .nLi h3").not(_this).removeClass("on");
			$(this).toggleClass("on");
		}

	});
    

	$(".side-nav-ul .sub").each(function () {
	    if ($(this).find("a.on").length > 0) {
	        $(this).parents(".nLi").addClass("on");
	    }
	})

	//控制侧边栏折叠
	$(".top-nav .ficon-menu").click(function(e) {
		e.stopPropagation();
		$(".side-nav").toggleClass("side-collapse");
		$("header").toggleClass("header-collapse");
		$(".body-content").toggleClass("content-collapse");

	})

	$(".app-ficon-menu").click(function() {
		$(".side-nav").toggleClass("app-side");
		$(".body-content").toggleClass("app-content");

	})

	
	
})


function setSideHei(){
	if($(window).width()>640){
		
		var hei = $(document).height() - $("header").height();
		var selfHei = $(".side-nav").height();
		var newHei = hei>selfHei?hei:selfHei;
		 $(".side-nav").css({"min-height":newHei,"_height":newHei});
//		 alert(newHei);
	}
}
	

$(window).load(function(){
	setSideHei();
})
$(window).resize(function(){
	setSideHei();
	if($(window).width()<=640){
		$(".side-nav").removeClass("side-collapse");
		$("header").removeClass("header-collapse");
		$(".body-content").removeClass("content-collapse");
	}
})

//进度条
function showProgressbar(div) {
	var showTag = div.attr("data-show");
	if (showTag == "hidden") {
		div.find(".progress").each(function() {
			var len = $(this).attr("data-width");
			$(this).animate({
				width: len + '%'
			}, 1000);
		})
		div.attr("data-show", "show");
	}

}

$(window).load(function() {
	var tag = $(".progressbar_container");
	var targetTop;

	function jadgeshow() {
		tag.each(function(i) {
			targetTop = $(this).offset().top - $(window).height();
			if ($(document).scrollTop() > targetTop) {

				showProgressbar($(this));
			}
		})
	}
	jadgeshow();
	$(window).scroll(function() {
		jadgeshow();
	})
})

//进度条 end


//模拟select
;(function($){  
  
    jQuery.fn.select = function(options){  
        return this.each(function(){  
            var $this = $(this);  
            var $shows = $this.find(".shows");  
            var $selectOption = $this.find(".selectOption");  
            var $el = $this.find("ul > li");  
                                      
            $this.click(function(e){  
                $(this).toggleClass("zIndex");  
                $(this).children("ul").toggleClass("dis");  
                e.stopPropagation();  
            });  
              
            $el.bind("click",function(){  
                var $this_ = $(this);  
                   
                $this.find("span").removeClass("gray");  
                $this_.parent().parent().find(".selectOption").text($this_.text());  
            });  
              
            $("body").bind("click",function(){  
                $this.removeClass("zIndex");  
                $this.find("ul").removeClass("dis");      
            })  
              
        //eahc End    
        });  
          
    }  
      
})(jQuery);

$(function(){
	$(".select-container").select();  
})

//模拟select end



//控制css
$(function(){
	$(".table-hover tbody tr").hover(function(){
		$(this).addClass("bgcolor");
	},function(){
		$(this).removeClass("bgcolor");
	});
	
	
	$(".add-input").click(function (e) {
	    e.stopPropagation();
	    var par = $(this).parents("tr");
	    par.addClass("on").siblings("tr").removeClass("on");
	});
	$(".add-input").each(function () {
	    if ($(this).val() != '') {
	        $(this).siblings(".add-input-txt").hide();
	    } else {
	        $(this).siblings(".add-input-txt").show();
	    }

	});
	$(".add-input").blur(function () {
	    if ($(this).val() != '') {
	        $(this).siblings(".add-input-txt").hide();
	    } else {
	        $(this).siblings(".add-input-txt").show();
	    }
	})
	$(document).click(function(){
		$(".add-table tr").removeClass("on");
	})
})



//回车输入关键词

$(function(){
	$(".enterwords-box").each(function(){
		var box = $(this);
		var enterinput = box.find(".enterinput").eq(0);
		box.click(function(e){
			e.stopPropagation();
			box.addClass("on");
			enterinput.focus();
		});
		$(document).click(function(){
			box.removeClass("on");
		});
		
		var wordValue='';
		var oldlen = 0;
		enterinput.keyup(function(event){
			 wordValue = $.trim(enterinput.val());
			 if(event.keyCode!=8){
			 	 oldlen = wordValue.length;
			 }
			if(event.keyCode==13){ 
				if(wordValue.length>40){
					alert("请输入内容小于20个字");
				}else if(wordValue.length>0){
					enterinput.before("<span class=\"wordspan\"><em class=\"word\">"+ wordValue +"</em><em class=\"remove ficon ficon-cancel\"></em></span>").val('');
				}
   	   		} 
   	   		if(event.keyCode==8){
   	   			if(oldlen>-1){
   	   				oldlen = oldlen -1;
   	   			}
   	   			if(oldlen==-1){
   	   			enterinput.prev(".wordspan").remove();
   	   			}
   	   		}
		});
		
		
	})
	
	$(".enterwords-box").on("click",".wordspan .remove",function(e){
		e.stopPropagation();
		$(this).parents(".wordspan").remove();
	})


})

function selcheck(id) {
    var e = document.getElementById(id);
    var objs = e.getElementsByTagName("input");
    if (e.checked) {
        e.checked = false;
        for (var i = 0; i < objs.length; i++) {
            if (objs[i].type.toLowerCase() == "checkbox")
                objs[i].checked = false;
        }
    } else {
        e.checked = true;
        for (var i = 0; i < objs.length; i++) {
            if (objs[i].type.toLowerCase() == "checkbox")
                objs[i].checked = true;
        }
    }
}

function tijiao() {
    if (document.getElementById("fenlei").value == "") {
        alert("请选择分类");
        document.getElementById("fenlei_Test").focus();
        return false;
    }
}

function pic_cut(id, cc) {
    window.open("pic_cut.aspx?editname=" + id + "&pic_name=" + document.getElementById(id).value + "&cc=" + cc + "", "", "status=no,scrollbars=no,top=20,left=110,width=740,height=340");
}