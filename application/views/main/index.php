<ul class="nav justify-content-center bg-dark text-light">
    <li class="nav-item">
        &nbsp;
    </li>
</ul>
<div id="app">
    <div class="container">
        <div class="row">
            <transition leave-active-class="animated fadeOut">
                <div class="notification is-success animated fadeIn text-center px-5 top-middle" v-if="successMSG"
                    @click="successMSG = false">{{ successMSG }}</div>
            </transition>
            <div class="col-md-12">
                <table class="table bg-dark my-3">
                    <tr>
                        <td> <button class="btn btn-light btn-block" @click="addModal= true">Add</button></td>
                        <td><input placeholder="Search" type="search" class="form-control" v-model="search.text"
                                @keyup="searchUser" name="search"></td>
                    </tr>
                </table>
                <table class="table table-striped table-hover">
                    <thead class="text-white bg-dark content-center">
                        <th class="text-white ">ID</th>
                        <th class="text-white">Firstname</th>
                        <th class="text-white">Lastname</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Mobile</th>
                        <th class="text-white">Address</th>
                        <th class="text-white">Gender</th>
                        <th colspan="2" class="text-center text-white">Action</th>
                    </thead>
                    <tbody class="table-light">
                        <tr v-for="user in users" class="table-default">
                            <td>{{user.id}}</td>
                            <td>{{user.firstname}}</td>
                            <td>{{user.lastname}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.contact}}</td>
                            <td>{{user.address}}</td>
                            <td class="content-center">
                                <img :src="imgGender(user.gender)" width='25' height="25">
                            </td>
                            <td class="content-right"><button class="btn btn-info fa fa-edit"
                                    @click="editModal = true; selectUser(user)"></button></td>
                            <td class="content-left"><button class="btn btn-danger fa fa-trash"
                                    @click="deleteModal = true; selectUser(user)"></button></td>
                        </tr>
                        <tr v-if="emptyResult">
                            <td colspan="9" rowspan="4" class="text-center h1">No Record Found</td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>
        <pagination :current_page="currentPage" :row_count_page="rowCountPage" @page-update="pageUpdate"
            :total_users="totalUsers" :page_range="pageRange">
        </pagination>
    </div>
    <?php include 'modal.php';?>

</div>