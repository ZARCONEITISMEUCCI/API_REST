

function aggiorna(id) {

    var result = (id).split('i');

    var iden = result[1];
    var studente =
        {
            "id":  iden,
            "nome": "",
            "cognome": "",
            "sidi": "",
            "tax": ""
        };
    var jsonStr = JSON.stringify(studente);
    $('#printhere').html(jsonStr);
    $.ajax({
        url: 'http://localhost:8080/student.php' + id,
        type: 'put',
        data: JSON.stringify(studente),
        contentType: 'application/json',
        success: function (textstatus {
            $("#printhere").html(textstatus);
        },
    });
}

$(document).ready(function() {
    update();
    function update() {
        var cont = 0;
        $.ajax(
           {
               url: 'http://localhost:8080/student.php',
               method: 'GET',
               contenttype: 'json',
               success: function (data) {
                    $.each(data.students, function (i, post) {
                        aggiungi(post.id, post.nome, post.cognome, post.sidi, post.tax)
                        cont++;
                    });
               },
           });
        return cont;
    }

    $('#submit').click(function () {
        alert("inserisci");
        var nome = $('#nome').val();
        var cognome = $('#cognome').val();
        var sidi = $('#sidi').val();
        var tax = $('#tax').val();
        var add = $("").attr("id");
        add = add+1;
        var studente =
        {
            "id": add,
            "name": nome,
            "surname": cognome,
            "sidi": sidi,
            "tax": tax
        };
        $.ajax({
            url: 'http://localhost:8080/student.php',
            type: 'post',
            data: JSON.stringify(studente),
            contentType: 'application/json',
            success: function (data, textstatus, jQxhr) {
            }
        });
    });

    $('#remove').click(function () {
        var size = $("#c div");
        var cont = 0;
        var caselle = new Array();
        var someObj = {};
        someObj.caselle = [];

        $("input:checkbox").each(function () {
            var $this = $(this);
            if ($this.is(":checked")) {
                someObj.caselle.push($this.attr("id"));
                $('#printhere').html("cancella: " + $this.attr("id"));
               cancella($this.attr("id"));
            }
        });
    });

    function cancella(identit) {
        $.ajax(
        {
            url: 'http://localhost:8080/student.php'+identit,
            method: 'DELETE',
            contenttype: 'string',
            success: function (textStatus, jQxhr) {
                $('#printhere').html(textStatus);
            },
            error: function (jQxhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function aggiungi(ID, nome, cognome, sidi, tax) {
        var div = document.createElement('div');
        div.className = 'row';
        
        div.innerHTML = "<div id='d" + ID + "' class='row'>" +
            "<div class='col-md-2'> " + ID + " </div> <div class='col-md-1'> <input name='sottolinea' id=" + ID +
            " type='checkbox' /> </div>" + "<div class='col-md-2'>" + nome + " " + cognome +
            "</div><div class='col-md-2'>" + sidi + "</div> <div class='col-md-2'>" + tax +
            "</div>" + "<div class='col-md-2'> <button id='mi" + ID +"' class='mod' type='button' onclick='aggiorna(this.id)'> mod </button> " +
            "<button id=del" + ID + " class='del' type='button' > del </button> </div><div class='col-md-1'> </div </div>";
        document.getElementById('c').appendChild(div);
    }
});
