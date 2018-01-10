<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de RUC VUE</title>
</head>
<body>
    <div id="app">
        <form>
            <input type="text" v-model="user.ruc" value="RUC" />
            <a href="#" v-on:click="getUsers">Enviar</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
    <!-- el siguiente enlace sirve para poder trabajar con ajax -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
    // comenzamos a trabajar con ajax
    // var urlUsers = "https://randomuser.me/api/?results=100";
    var urlUsers = "ruc-webservice.php";

    // De esta manera creamos un objeto Vue
    new Vue({
        el : "#app",
        data : {
            user : []
        },
        methods : {
            getUsers : function(){
                newUser = {
                    ruc : this.user.ruc
                }
                axios.post(urlUsers,newUser)
                .then(response => {
                    //console.log(response);
                    // console.log(response.data.entity['nombre_o_razon_social']);
                    console.log(response.data.entity);
                });
            }
        },
        filters: {
            json: (value) => { return JSON.stringify(value, null, 2) }
        }
    });

    </script>
</body>
</html>
