
    <script src="https://js.stripe.com/v3/"></script>
 
    <button id="verify-button">Verify</button>
<input type="hidden" value="{{route('my.settings.verify.geturl')}}" id="url"> 
<input type="hidden" value="{{route('my.settings.verify.insert_details')}}" id="ajaxurl"> 
    <script type="text/javascript">
      // Set your publishable key: remember to change this to your live publishable key in production
      // See your keys here: https://dashboard.stripe.com/apikeys
      var stripe = Stripe('pk_test_51MYiW4HAToWcG16ugTz1kWXpwOTpcyQKbjSh5DQ5QncaU5oKHPS3MrM0xdiwL2yX0I3mYqHcaBSvosFqw0Bs3dyr00BEzS73FA')

      var verifyButton = document.getElementById('verify-button');
  var fetch_url = document.getElementById('url').value;
  var ajaxurl = document.getElementById('ajaxurl').value;
  // console.log(fetch_url)
      verifyButton.addEventListener('click', function() {
        // Get the VerificationSession client secret using the server-side
        // endpoint you created in step 3.
        fetch(fetch_url, {
          method: 'POST',
          headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
        })
        .then(function(response) {
          return response.json();
        })
        .then(function(session) {
          // Show the verification modal.
          return stripe.verifyIdentity(session.client_secret);
        })
        .then(function(result) {
        
          // If `verifyIdentity` fails, you should display the error message
          // using `error.message`.
          console.log(result);
          

            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              method: 'POST',
                dataType: 'json',
                url: ajaxurl,
               
            });

            // window.location.href = 'submitted.html';
          
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
      });
    </script>
 
