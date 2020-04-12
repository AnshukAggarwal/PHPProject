$(function(){
    $("form .create_form").hide();
    $("form .create_form:first").show();
    $("#formCompany").hide();
    $("#createJobForm #continue1").click(function () {

        if(document.getElementsByName("jobName")[0].value=="")
        {
            document.getElementsByName("jobName")[0].focus();
            return false;
        };

        if(document.getElementsByName("jobLocation")[0].value=="")
        {
            document.getElementsByName("jobLocation")[0].focus();
            return false;
        };

        $(this).closest(".create_form").hide();
        $(this).closest(".create_form").next().show();
        return false;
    })

    $("#createJobForm #continue2").click(function () {

        if(document.getElementsByName("jobSalary")[0].value=="")
        {
            document.getElementsByName("jobSalary")[0].focus();
            return false;
        };

        if(document.getElementsByName("jobDescription")[0].value=="")
        {
            document.getElementsByName("jobDescription")[0].focus();
            return false;
        };

        $(this).closest(".create_form").hide();
        $(this).closest(".create_form").next().show();
        return false;
    })

    $("#createJobForm #submit").click(function () {

        if($("#company_id :selected").text()=="Other") {
            if (document.getElementsByName("companyName")[0].value == "") {
                document.getElementsByName("companyName")[0].focus();
                return false;
            }
            ;
            if (document.getElementsByName("companyDescription")[0].value == "") {
                document.getElementsByName("companyDescription")[0].focus();
                return false;
            }
            ;

            if (document.getElementsByName("headOffice")[0].value == "") {
                document.getElementsByName("headOffice")[0].focus();
                return false;
            }
            ;

            if (document.getElementsByName("lob")[0].value == "") {
                document.getElementsByName("lob")[0].focus();
                return false;
            }
            ;

            if (document.getElementsByName("website")[0].value == "") {
                document.getElementsByName("website")[0].focus();
                return false;
            }
            ;
        }
        else {
            if (document.getElementsByName("company_id")[0].value == "") {
                document.getElementsByName("company_id")[0].focus();
                return false;
            }
        }

    })

    $("#createJobForm a").click(function () {
        $(this).closest(".create_form").hide();
        $(this).closest(".create_form").prev().show();
    })

    $("#company_id").change(function () {
        if ($("#company_id :selected").val()=="Other") {
            $("#formCompany").slideDown();
        }
        if ($("#company_id :selected").val()!="Other") {

            $("#formCompany").slideUp();
        }
    })


})