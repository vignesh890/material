<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Form</title>
    <link rel="stylesheet" href="{{ asset('style_1.css') }}">
    
</head>
<body>
    <div class="container">
        <h1>Update Item</h1>
        <form id="itemForm" method="post" action="/update/{{ $edits->id }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required value="{{ $edits->name }}">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="electronics" {{ $edits->category == 'electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="clothing" {{ $edits->category == 'clothing' ? 'selected' : '' }}>Clothing</option>
                    <option value="grocery" {{ $edits->category == 'grocery' ? 'selected' : '' }}>Grocery</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required value="{{ $edits->price }}">
            </div>
            <div class="form-group">
                <label for="discount_type">Discount Type:</label>
                <select id="discount_type" name="discount_type">
                    <option value="">Select a discount type</option>
                    <option value="percentage" {{ $edits->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                    <option value="fixed" {{ $edits->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                    <!-- <option value="no discount" {{ $edits->discount_type == 'no discount' ? 'selected' : '' }}>No Discount</option> -->
                </select>
            </div>
            <div class="form-group" id="discount-group" style="display: none;">
                <label for="discount">Discount:</label>
                <input type="number" id="discount" name="discount" value="{{ $edits->discount }}">
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    $(document).ready(function() {
    $('#discount_type').change(function() {
        if ($(this).val() !== "") {
            $('#discount-group').show();
            if ($(this).val() === 'percentage') {
                $('#discount').attr('max', 100);
            } else {
                $('#discount').removeAttr('max');
            }
        } else {
            $('#discount-group').hide();
            $('#discount').val('');
        }
    });

    $('#price, #discount').on('input', function() {
        if ($(this).val() < 0) {
            $(this).val(0);
        }
    });

    // $('#itemForm').submit(function(e) {
    //     e.preventDefault();
    //     // Add your form submission logic here
    //     alert('Form submitted successfully!');
    // });
});

   </script>
</body>
</html>
