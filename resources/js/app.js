import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png , .jpg , .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        if (document.querySelector("#imagen").value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector("#imagen").value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );

            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});



/* Archivo , request , datos del form */
dropzone.on("success", function (file, xhr, formData) {
    const { imagen } = xhr;
    document.querySelector("#imagen").value = imagen;
});

dropzone.on('removedfile' , function(){
    document.querySelector("#imagen").value = "";
});