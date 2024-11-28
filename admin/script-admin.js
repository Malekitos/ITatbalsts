$(document).ready(function(){
    // console.log("jQuery darbojas!")
    let edit = false

    fetchPieteikumi()
    fetchLietotaji()

    function fetchPieteikumi(){
        $.ajax({
            url: 'database/pieteikumi_list.php',
            type: 'GET',
            success: function(response){
                const pieteikumi = JSON.parse(response)
                let template = ""
                pieteikumi.forEach(pieteikums =>{
                    template += `
                        <tr piet_ID="${pieteikums.id}">
                            <td>${pieteikums.id}</td>
                            <td>${pieteikums.vards}</td>
                            <td>${pieteikums.uzvards}</td>
                            <td>${pieteikums.epasts}</td>
                            <td>${pieteikums.talrunis}</td>
                            <td>${pieteikums.datums}</td>
                            <td>${pieteikums.statuss}</td>
                            <td>
                                <a class="pieteikums-item"> <i class="fa fa-edit"></i></a>
                                <a class="pieteikums-delete"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    `
                })
                $('#pieteikumi').html(template)
            },
            error: function(){
                alert("Neizdevās ielādēt datus!")
            }
        })
    }





    function searchPieteikumi() {
        let searchTerm = document.getElementById("search_input").value.trim();
    
        if (searchTerm === "") {
            fetchPieteikumi()
        }
    
        $.ajax({
            url: 'database/pieteikumi_list.php',  
            type: 'POST',
            data: { search_term: searchTerm },
            success: function(response) {
                const pieteikumi = JSON.parse(response);
                let template = "";
    
                pieteikumi.forEach(pieteikums => {
                    template += `
                        <tr piet_ID="${pieteikums.id}">
                            <td>${pieteikums.id}</td>
                            <td>${pieteikums.vards}</td>
                            <td>${pieteikums.uzvards}</td>
                            <td>${pieteikums.epasts}</td>
                            <td>${pieteikums.talrunis}</td>
                            <td>${pieteikums.datums}</td>
                            <td>${pieteikums.statuss}</td>
                            <td>
                                <a class="pieteikums-item"> <i class="fa fa-edit"></i></a>
                                <a class="pieteikums-delete"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    `;
                });
    
                $('#pieteikumi').html(template);
            },
            error: function() {
                alert("Neizdevās ielādēt datus!");
            }
        });
    }
    
    document.getElementById("search_button").addEventListener("click", searchPieteikumi);







    function fetchLietotaji(){
        $.ajax({
            url: 'database/lietotaji_list.php',
            type: 'GET',
            success: function(response){
                const lietotaji = JSON.parse(response)
                let template = ""
                lietotaji.forEach(lietotajs =>{
                    template += `
                        <tr liet_ID="${lietotajs.id}">
                            <td>${lietotajs.id}</td>
                            <td>${lietotajs.lietotajvards}</td>
                            <td>${lietotajs.vards}</td>
                            <td>${lietotajs.lietotajuzvards}</td>
                            <td>${lietotajs.lietotajepasts}</td>
                            <td>${lietotajs.loma}</td>
                            <td>${lietotajs.regdatums}</td>
                            <td>
                                <a class="lietotajs-item"> <i class="fa fa-edit"></i></a>
                                <a class="lietotajs-delete"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    `
                })
                $('#lietotaji').html(template)
            },
            error: function(){
                alert("Neizdevās ielādēt datus!")
            }
        })
    }
    
    $(document).on('click', '.pieteikums-item', (e) =>{
        $(".modal").css('display', 'flex')

        const element = $(e.currentTarget).closest('tr')
        const id = $(element).attr("piet_ID")
        // console.log(id)

        $.post('database/pieteikums_single.php', {id}, (response) => {
            const pieteikums = JSON.parse(response)
            $('#vards').val(pieteikums.vards)
            $('#uzvards').val(pieteikums.uzvards)
            $('#epasts').val(pieteikums.epasts)
            $('#talrunis').val(pieteikums.talrunis)
            $('#apraksts').val(pieteikums.apraksts)
            $('#statuss').val(pieteikums.statuss)
            $('#piet_ID').val(pieteikums.id)
            $('#created-time').text(`Pieteikums izveidots: ${pieteikums.datums}`);
            $('#edit-time').text(`Pēdējās izmaiņas pieteikumā: ${pieteikums.last_updated}`);
            $('#created-ip').text(`(IP:${pieteikums.ip_adrese})`);
            $(".apaksa-pieteikums").css('display', 'flex')

            edit = true
        })
    })

    $(document).on('click', '.lietotajs-item', (e) =>{
        $(".modal").css('display', 'flex')

        const element = $(e.currentTarget).closest('tr')
        const id = $(element).attr("liet_ID")
        console.log(id)

        $.post('database/lietotajs_single.php', {id}, (response) => {
            const lietotajs = JSON.parse(response)
            $('#lietotajvards').val(lietotajs.lietotajvards)
            $('#vards').val(lietotajs.vards)
            $('#lietotajuzvards').val(lietotajs.lietotajuzvards)
            $('#lietotajepasts').val(lietotajs.lietotajepasts)
            $('#parole').val(lietotajs.parole)
            $('#loma').val(lietotajs.loma)
            $('#liet_ID').val(lietotajs.id)
            edit = true

        })
    })

    $(document).on('click', '#new-btn', (e) =>{
        $(".modal").css('display', 'flex')
        $(".apaksa-pieteikums").css('display', 'none')

    })

    $(document).on('click', '.close-modal', (e) =>{
        $(".modal").hide()
        $("#parole").hide()
        $("#pieteikumaForma").trigger('reset')
        $("#lietotajuForma").trigger('reset')


        edit = false
    })

    $(document).on('click', '.pieteikums-delete', (e) =>{
        if(confirm("Vai tiešām vēlies dzēst?")){
            const element = $(e.currentTarget).closest('tr')
            const id = $(element).attr("piet_ID")
            //console.log(id)
            $.post('database/pieteikums_delete.php', {id}, () => {
                fetchPieteikumi()
            })

        }
    })

    $(document).on('click', '.lietotajs-delete', (e) =>{
        if(confirm("Vai tiešām vēlies dzēst?")){
            const element = $(e.currentTarget).closest('tr')
            const id = $(element).attr("liet_ID")
            //console.log(id)
            $.post('database/lietotajs_delete.php', {id}, () => {
                fetchLietotaji()
            })

        }
    })

    $('#pieteikumaForma').submit(e =>{
        e.preventDefault()
        const postData = {
            vards: $('#vards').val(),
            uzvards: $('#uzvards').val(),
            epasts: $('#epasts').val(),
            talrunis: $('#talrunis').val(),
            apraksts: $('#apraksts').val(),
            statuss: $('#statuss').val(),
            id: $('#piet_ID').val()
        }

        url = !edit ? 'database/pieteikums_add.php' : 'database/pieteikums_edit.php'
        console.log(postData, url)
        $.post(url, postData, () =>{
            $(".modal").hide()
            $("#pieteikumaForma").trigger('reset')
            fetchPieteikumi()
            edit = false
        })
    })
    
    $('#lietotajuForma').submit(e =>{
        e.preventDefault()
        const postData = {
            lietotajvards: $('#lietotajvards').val(),
            vards: $('#vards').val(),
            lietotajuzvards: $('#lietotajuzvards').val(),
            lietotajepasts: $('#lietotajepasts').val(),
            parole: $('#parole').val(),
            loma: $('#loma').val(),
            id: $('#liet_ID').val()
        }

        url = !edit ? 'database/lietotajs_add.php' : 'database/lietotajs_edit.php'
        console.log(postData, url)
        $.post(url, postData, () =>{
            $(".modal").hide()
            $("#lietotajuForma").trigger('reset')
            fetchLietotaji()
            edit = false
        })
    })

    $(document).on('click', '#paradit', (e) =>{
        $("#parole").css('display', 'flex')
    })


   
}) // BEIGAS

