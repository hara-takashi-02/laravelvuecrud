<template>
  <div class="container">
    <section class="">
      <h2 class="c-title">テスト</h2>
      <table class="table table-hover">
  
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Person In Charge</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
  
        <tbody>
  
          <tr v-for="(task, index) in tasks" :key="index">
              <th scope="row">{{ task.id }}</th>
              <td>{{ task.title }}</td>
              <td>{{ task.content }}</td>
              <td>{{ task.person_in_charge }}</td>
              <td>
                  <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                      <button class="btn btn-primary">Show</button>
                  </router-link>
              </td>
              <td>
                  <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                      <button class="btn btn-success">Edit</button>
                  </router-link>
              </td>
              <td>
                  <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
              </td>
          </tr>
  
        </tbody>
      </table>
    </section>

    <section>
      <h2 class="c-title">works</h2>
    </section>
  </div>
</template>

<script>
    export default {   
        // tasks配列は、最初は空
        data: function () {
            return {
                tasks: []
            }
        },
        methods: {
            // API経由で全タスクを取得
            getTasks() {
                axios.get('/api/task')
                    .then((res) => {
                        this.tasks = res.data;
                    });
            },
                // API経由で指定IDのタスクを削除
            deleteTask(id) {
                axios.delete('/api/task/' + id)
                    .then((res) => {
                        this.getTasks();
                    });
            }
        },
        //マウントし終わったらAPIでタスク取得する。
        mounted() {
            this.getTasks();
        }
    }
</script>