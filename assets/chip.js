/**
 * Created by marcos on 11/11/14.
 */

function adicionar_campo ( ) {

    var count = $("#counter").val();
    count++;
    $("#counter").val( count );

    var html = '<div class="margup" id="line'+count+'">';
        html+= '<div class="form-group col-lg-2 col-md-2">';
        html+= '    <label class="sr-only" for="filme">Filme</label>';
        html+= '    <input type="text" class="form-control" id="filme'+count+'" name="filme'+count+'" placeholder="Filme">';
        html+= '    </div>';
        html+= '<div class="form-group col-lg-2 col-md-2">';
        html+= '        <label class="sr-only" for="site">Site</label>';
        html+= '        <input class="form-control" type="text" id="site'+count+'" name="site'+count+'"  placeholder="Site">';
        html+= '    </div>';
        html+= '    <div class="form-group col-lg-2 col-md-2">';
        html+= '    <label class="sr-only" for="ator">Ator</label>';
        html+= '    <input type="text" class="form-control" id="ator'+count+'" name="ator'+count+'" placeholder="ator">';
        html+= '</div>';
        html+= '<button type="button" onclick="remover_campo('+count+')" id="remover'+count+'" class="btn btn-danger">remover</button> ';
        html+= '<button type="button" onclick="adicionar_campo()" id="adicionar'+count+'" class="btn btn-info">Adicionar</button>';
        html+= '</div>';

        var ids = count - 1;
        $("#adicionar"+ids).remove();

        $("#remover"+ids).remove();
        $("#adicionar").remove();
        $("#lines").append(html);


}

function remover_campo( id ) {
    var count = $("#counter").val();
    count--;
    $("#counter").val( count );

    $("#line"+id).remove();

    if(count <= 1) {
        var html = '<button type="button" onclick="adicionar_campo()" id="adicionar" class="btn btn-info">Adicionar</button>';
        $("#line" + count).append(html);
    }else{
        var html = '<button type="button" onclick="remover_campo(' + count + ')" id="remover' + count + '" class="btn btn-danger">remover</button> ';
        html += '<button type="button" onclick="adicionar_campo()" id="adicionar" class="btn btn-info">Adicionar</button>';
        $("#line" + count).append(html);
    }

}

function delete_record ( id ) {

    window.location.href = 'index.php?del='+id;

}

function update_record ( id ) {
    $('#myModal').modal( );

    var ator  = $("#ato_"+id).html();
    var site  = $("#sit_"+id).html();
    var filme =  $("#fil_"+id).html();

    $("#id_filme").val( id );
    $("#editator").val( ator );
    $("#editfilme").val( filme );
    $("#editsite").val( site );


}

$( document ).ready(function() {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").alert('close');
    });
});