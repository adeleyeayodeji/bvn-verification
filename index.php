<!doctype html>
<html lang="en">

    <head>
        <title>BVN Verification</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="container pl-5 pr-5">
            <div class="content">
                <div class="header p-3 bg-primary text-center text-white mt-2">
                    <h2>Check BVN Details</h2>
                </div>
                <hr>
                <div class="container">
                    <form action="">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Enter BVN Number</label>
                                    <input type="number" id="bvn" placeholder="Enter BVN to verify"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <input type="button" id="submitbtn" value="Check"
                                    class="form-control bg-primary text-white mt-4">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="firstname" placeholder="Enter first name"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lastname" placeholder="Enter last name"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="text" name="dob" placeholder="Enter DOB" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input type="text" name="mobile" placeholder="Enter mobile number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">BVN Number</label>
                                    <input type="text" name="bvn" placeholder="Enter BVN number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script>
        $(function() {
            $("#submitbtn").click(function(e) {
                e.preventDefault();
                let bvn = $("#bvn").val();
                $.ajax({
                    type: "GET",
                    data: {},
                    url: "https://api.paystack.co/bank/resolve_bvn/" + bvn,
                    headers: {
                        "Authorization": "Bearer sk_live_here",
                        "Cache-Control": "no-cache"
                    },
                    beforeSend: function() {
                        console.log("Checking BVN . . .");
                    },
                    success: function(response) {
                        //Load to form
                        $('input[name="firstname"]').val(response.data.first_name);
                        $('input[name="lastname"]').val(response.data.last_name);
                        $('input[name="dob"]').val(response.data.formatted_dob);
                        $('input[name="mobile"]').val(response.data.mobile);
                        $('input[name="bvn"]').val(response.data.bvn);
                        console.log(response);
                    }
                });
            });


        });
        </script>
    </body>

</html>