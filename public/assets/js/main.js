setTimeout(() => {
    $('#success').slideUp('fast');
}, 1500);

function time(id) {
    setTimeout(() => {
        $(id).trigger('click');
    }, 500);
}

function transport(id, img, nama, jenis) {
    document.getElementById('img-transport').src = img
    document.getElementById('name-transport').innerHTML = nama
    document.getElementById('jenis-kendaraan').innerHTML = jenis
    document.getElementById('id-transport').value = id
    time('#close-transport')
}

function driver(id, img, nama, nohp) {
    document.getElementById('img-driver').src = img
    document.getElementById('name-driver').innerHTML = nama
    document.getElementById('nomor-hp').innerHTML = nohp
    document.getElementById('id-driver').value = id
    time('#close-driver')
}
