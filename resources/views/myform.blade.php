<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Validation Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>

    <div class="container"
        <h2>Laravel Ajax Validation</h2>
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <form id="store-user" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" id="name">
                <div class="text-danger error" data-error="name"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="text" name="email" id="email">
                <div class="text-danger error" data-error="email"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password">
                <div class="text-danger error" data-error="password"></div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script type="text/javascript">
        $('#store-user').on('submit', function(e) {
            e.preventDefault();
            $('.error').html('');
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success(response) {
                    console.log('User created successfully.');
                    //Do whatever you want here … 
                },
                error(error) {
                    let errors = error.responseJSON.errors
                    for (let key in errors) {
                        let errorDiv = $(`.error[data-error="${key}"]`);
                        if (errorDiv.length) {
                            errorDiv.text(errors[key][0]);
                        }
                    }
                }
            });
        });
    </script>

</body>
</html>