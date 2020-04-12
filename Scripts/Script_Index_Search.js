window.onload = function () {

    //To add moseover lines below links
    $(".link").mouseover(function () {
        $(this).addClass("underline");
    })

    $(".link").mouseleave(function () {
        $(this).removeClass("underline");
    })

    //Jquery AJAX to dynamically fetch data from the DB
    $(".search_job").click(function () {
        $("#search_section4 #email").css("display", "none");
        $("#search_section4 #jobDetails").css("display", "block");
        var id = $(this).children(":first").text().trim();
        var companyId;
        $.ajax({
            url: '../../Database/Data.php',
            method: 'post',
            data: 'id=' + id
        }).done(function (jobs) {
            jobs = JSON.parse(jobs);
            jobs.forEach(function (job) {
                $("#jobDetails #title").html(job.title);
                $("#jobDetails #location").html(job.location);
                $("#jobDetails #description").html(job.description);


                companyId = job.company_id;

                $.ajax({
                    url: '../../Database/Data.php',
                    method: 'post',
                    data: 'companyId=' + companyId
                }).done(function (companyName) {
                    $("#jobDetails #companyDetails #company").html(companyName);
                })

            })
        })



    })

}
