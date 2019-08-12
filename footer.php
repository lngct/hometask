<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script src="js/datepicker.min.js"></script>
<script>
    $('document').ready(function () {
        $('#selectDate').prop('disabled', true);
        $('select').on('change', function() {
            $('#selectDate').prop('disabled', false);
            var ratetype = this.value;

            $.ajax({
                url: "DeliveryDays.php",
                type: "POST",
                data: {ratetype:ratetype},
                dataType: "json",
                success: function(result) {
                    var dni = Number(result);
                    var minDate = new Date();
                    minDate.setDate(minDate.getDate() + dni);
                    $('#selectDate').datepicker({
                        minDate: minDate
                    })
                }
            })
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#clientphone").mask("+7 (999) 999-99-99");
    });
</script>
</body>
</html>
