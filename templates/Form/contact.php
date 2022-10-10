<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form action="https://formsubmit.co/ritvik.p.21@gmail.com" method="post">
        <p></p>
        <div>
            <h2>Hello my name is:</h2>
            <input type="text" name="Name"  placeholder="Enter your first and last name" class="form-control mb-2" maxlength="40" required>
        </div>
        <p></p>
        <div>
            <h2>My email is: </h2>
            <input type="email" name="Email" placeholder="Enter your email" class="form-control mb-2" maxlength="40"
                   required>
        </div>
        <p></p>
        <div>
            <h2>My mobile number is: </h2>
            <input type="tel" title="Please enter a valid mobile number" name="Mobile number" placeholder="Enter your mobile number"
                   minlength="10" maxlength="10" pattern="\d*" class="form-control mb-2"
                  required>
        </div>
        <p></p>
        <div>
            <h2>My invoice number if I have one: </h2>
            <input type="tel" name="Invoice number" placeholder="Enter your invoice number (optional)"
                   minlength="12" maxlength="12" pattern="\d*"  class="form-control mb-2" >
        </div>
        <p></p>
        <div>
            <h2>The subject of my query is: </h2>
            <input type="text" name="Subject" placeholder="Enter your subject" class="form-control mb-2" maxlength="30"
                   required>
        </div>
        <p></p>
        <div>
            <h2>My query is: </h2>
            <textarea name="Query" class="form-control mb-2" placeholder="Enter your query" maxlength="500" size="50" rows="3"
                      required></textarea>
        </div>
        <p></p>
        <button class="btn btn-success" style="background-color: #cc1f1a;border-color: #cc1f1a"> Send</button>
        <p></p>
        <input type="hidden" name="_template" value="table">
        <!--<input type="hidden" name="_next" value="[enter the website url here]"-->
    </form>
</div>
</body>
</html>
