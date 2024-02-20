$(document).ready(function() {
    $('#productsTable').DataTable({
        "bLengthChange": false,
        layout: {
            topStart: {
                buttons: ['excel', 'print']
            }
        },
        ajax: {
            url: window.location.origin +  '/api/getproducts', 
            dataSrc: 'products' 
        },
        columns: [
            { data: 'name' }, 
            { data: 'reference' },
            { data: 'category' }, 
            { data: 'price' }, 
            { data: 'weight' }, 
            { data: 'stock' }, 
            { "defaultContent": true,render: function ( data, type, row ) {
                return " <a class='btn btn-primary btn-sm' role='button' href='{{ url('editproduct/') }}/"+ row["id"] + "'> Editar </a> " +
                " <a href='{{ url('deletproduct/') }}/"+ row["id"] + "' role='button' class='btn btn-danger btn-sm'  data-confirm-delete='true'>Eliminar </a>";
     
            } }
        ]
    });

    $('body').on("click", ".evt-modal", function (e) { 
        fetch(window.location.origin +  '/api/getproducts')
            .then(response => response.json())
            .then((data) =>{
                const select = $('#product_id');
                const products = data.products;
                for (let i = 0; i < products.length; i++) {
                    let o = $('<option/>', { value: products[i].id })
                    .text(products[i].name)
                    o.appendTo(select);
                } 
            });
    })
   
});