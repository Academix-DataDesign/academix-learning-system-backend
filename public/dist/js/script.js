$(document).ready(function () {
    $('.fade-out-alert').each(function () {
        var alertElement = $(this);

        alertElement.fadeIn(3000, function () {
            setTimeout(function () {
                alertElement.fadeOut(500, function () {
                    alertElement.remove();
                });
            }, 2000);
        });
    });
});

// document.addEventListener('DOMContentLoaded', function () {
//     let descriptions = document.querySelectorAll('.course-description');

//     descriptions.forEach((description) => {
//         let text = description.textContent;
//         let wordsPerLine = 10;
//         let wordArray = text.split(' ');
//         let lines = [];

//         for (let i = 0; i < wordArray.length; i += wordsPerLine) {
//             let line = wordArray.slice(i, i + wordsPerLine).join(' ');
//             lines.push(line);
//         }

//         description.innerHTML = lines.join('<br>');
//     });
// });

$(document).ready(function () {
    $('.delete-course-form').on('submit', function (event) {
        event.preventDefault();
        const form = $(this);
        const courseId = form.data('course-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The course has been deleted.',
                            icon: 'success',
                            timer: 1500,
                            timerProgressBar: true,
                        }).then(() => {
                            form.closest('tr').remove();
                        });
                    },
                    error: function (error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while deleting the course.',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    });
});