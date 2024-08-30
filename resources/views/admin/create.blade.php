@extends('admin.layout.app')
@section('contant')
    <div class="main mt-5">
        <div class="card-header">
            <div class="row col">
                <div class="col">
                    <b>CREATRE FORM</b>
                </div>
                <div class="col">
                    <a href="{{ route('home') }}" class="btn btn-success">FORM LIST</a>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row" style="gap: 1rem">
                <div class="card col-md-7 form-builder">
                    <div class="card-body">
                        <form id="mainForm">
                            <div class="mb-3">
                                <input type="text" required class="form-control" name="title" id="title"
                                    placeholder="Enter Form title">
                                <hr>
                                <div class="dyformCanva"></div>
                            </div>
                            <button type="button" id="saveForm" class="btn btn-primary">Save Form</button>
                        </form>
                    </div>
                </div>

                <div class="card col-md-4 form-builder">
                    <div class="card-body">
                        <button id="textField" class="col-md-6 mt-3 btn btn-primary">Add Text Field</button><br>
                        <button id="textareaField" class="col-md-6 mt-3 btn btn-primary">Add Textarea</button><br>
                        <button id="checkboxField" class="col-md-6 mt-3 btn btn-primary">Add Checkbox</button><br>
                        <button id="radioField" class="col-md-6 mt-3 btn btn-primary">Add Radio Button</button><br>
                        <button id="selectField" class="col-md-6 mt-3 btn btn-primary">Add Dropdown</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <script>
        $(document).ready(function() {
            var templates = {
                textField: '<div class="form-field"><input type="text" class="form-control" placeholder="Text Field" required></div>',
                textareaField: '<div class="form-field"><textarea class="form-control" rows="3" placeholder="Textarea" required></textarea></div>',
                checkboxField: '<div class="form-field"><div class="form-check"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">Checkbox</label></div><input type="text" class="form-control mt-2" placeholder="Label"></div>',
                radioField: '<div class="form-field"><div class="form-check"><input class="form-check-input" type="radio" name="radioGroup" value=""><label class="form-check-label">Radio button</label></div><input type="text" class="form-control mt-2" placeholder="Label"></div>',
                selectField: '<div class="form-field"><select class="form-select" aria-label="Default select example"><option selected>Open this select menu</option><option value="1">One</option><option value="2">Two</option><option value="3">Three</option></select></div>'
            };

            function addToCanvas(html) {
                $('.dyformCanva').append(html);
            }

            $('#textField').click(function() {
                addToCanvas(templates.textField);
            });

            $('#textareaField').click(function() {
                addToCanvas(templates.textareaField);
            });

            $('#checkboxField').click(function() {
                addToCanvas(templates.checkboxField);
            });

            $('#radioField').click(function() {
                addToCanvas(templates.radioField);
            });

            $('#selectField').click(function() {
                addToCanvas(templates.selectField);
            });

            $('#saveForm').click(function() {
                var formTitle = $('#title').val();
                var formContent = $('.dyformCanva').html();

                $.ajax({
                    url: "{{ route('form.store') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: formTitle,
                        content: formContent
                    },
                    success: function(response) {
                        alert('Form saved successfully!');
                        console.log(response);
                    },
                    error: function(xhr) {
                        alert('An error occurred while saving the form.');
                    }
                });
            });
        });
    </script>
@endsection
