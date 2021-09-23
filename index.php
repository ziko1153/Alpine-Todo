<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpine Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

    <div class="container" x-data="taskList">
        <form method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Select House Structure</th>
                        <th scope="col">Score</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(task, index) in tasks" :key="index">
                        <tr>
                            <td>
                                <select class="form-select" x-model="task.house_select" name="house_select[]">
                                    <option>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </td>
                            <td><input x-model="task.score" class="form-control" type="number" min="1" name="score[]" placeholder="Score" /></td>
                            <td><input x-model="task.quantity" class="form-control" type="number" min="1" name="quantity[]" placeholder="Quantity"></td>
                            <td><button class="btn btn-default" @click="removeTask(index)">X</button></td>
                        </tr>
                    </template>

                </tbody>


            </table>
            <button @click.prevent="addNewTask()">Add +</button>
        </form>
    </div>



</body>

</html>

<script>
    let taskList = {

        tasks: [],
        addNewTask() {
            this.tasks.push({
                house_select: 1,
                score: '',
                quantity: ''
            });
        },
        removeTask(index) {
            this.tasks.splice(index, 1);
        },

    }
</script>