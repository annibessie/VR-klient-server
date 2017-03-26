$(function () {
    $("li:first").addClass("active");

    $("#next").click(function () {
        var aktiivne = $("li.active");
		 	aktiivne.next("li").addClass("active");
            aktiivne.first().removeClass("active");
		
            if (aktiivne.is($("li").last())){
                $("li.active").removeClass("active");
                $("li").first().addClass("active");
            }
        });
		

    $("#prev").click(function () {
        var aktiivne = $("li.active");
            aktiivne.prev("li").addClass("active");
            aktiivne.last().removeClass("active");
		
            if (aktiivne.is($("li").first())){
                aktiivne.removeClass("active");
                $("li").last().addClass("active");
            }
	})
});