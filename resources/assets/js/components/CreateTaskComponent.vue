<template>

    <div>
        <div class="flex-container">
            <div v-for="url in urldata" >
                <div class=" flex-item column">
                    <p>{{ url.name }}</p>
                    <a :href="/task/+url.id">
                        <button>View</button>
                    </a>
                    <a :href="/task/+url.id">
                        <button>Pass</button>
                    </a>
                </div>
            </div>
            <button v-if="!showModal" v-on:click="showModal = true">+</button>
        </div>

        <div class="modal-mask" v-if="showModal">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <form>
                        <label v-bind:for="name">Name: </label><input type="text" v-bind:id="name" v-bind:name="name"
                                                                      v-model.lazy="modal.nameTask"/>
                        <label v-bind:for="description">Description: </label><input type="text" v-bind:id="description"
                                                                                    v-bind:name="description"
                                                                                    v-model.lazy="modal.description"/>
                        <label v-bind:for="time_limit">Time limit: </label><input type="text" v-bind:id="time_limit"
                                                                                  v-bind:name="time_limit"
                                                                                  v-model.lazy="modal.time_limit"/>
                        <input type="button" value="create" v-on:click="create"/>
                    </form>
                    <button v-on:click = "showModal = false">X</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateTaskComponent",
        props: {
            urldata: Array
        },
        data: function () {
            return {
                showModal: false,
                urldata: [],
                modal: {
                    nameTask: '',
                    description: '',
                    time_limit: '',

                }
            }
        },
        methods: {
            create: function () {
                this.showModal = false;
                axios.post('/task', {
                    name: this.modal.nameTask,
                    description: this.modal.description,
                    time_limit: this.modal.time_limit

                })
                    .then((response) => {
                        this.urldata = response.data
                        this.modal.time_limit = ''
                        this.modal.description = ''
                        this.modal.nameTask = ''
                    });
            }
        }
    }
</script>

<style>

    .flex-container {
        display: flex;
    }

    .flex-item {
        text-align:center;
        font-size: 1.1em;
        border:1px solid #ccc;
    }

    .column {
        flex-direction: column;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>