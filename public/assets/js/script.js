// $(document).ready(function () {
//     $("#member-list").DataTable({
//         paging: true,
//         searching: true,
//         sorting: true,
//     });
// });

const formFile = document.getElementById("formFile");
const imagePreview = document.getElementById("imagePreview");

formFile.addEventListener("change", () => {
    const file = formFile.files[0];
    console.log(file);
    const reader = new FileReader();

    // Read the file as a data URL
    reader.readAsDataURL(file);

    // When the reader has finished reading the file, update the image preview
    reader.onload = () => {
        imagePreview.src = reader.result;
    };
});
