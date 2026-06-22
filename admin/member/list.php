<?php
include "../includes/auth.php";
include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="main" style="margin-left:250px;padding:30px;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Membership Applications</h2>

        <!-- <div>
            <button class="btn btn-success">
                Export Excel
            </button>
        </div> -->
    </div>

    <!-- SUMMARY -->

    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small>Total Members</small>
                    <h3>128</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small>Pending Review</small>
                    <h3 class="text-warning">24</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small>Approved</small>
                    <h3 class="text-success">90</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small>Rejected</small>
                    <h3 class="text-danger">14</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- FILTER -->

    <div class="card mb-4">

        <div class="card-body">

            <form>

                <div class="row">

                    <div class="col-md-4">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search member...">
                    </div>

                    <div class="col-md-3">

                        <select class="form-select">
                            <option>All Status</option>
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Rejected</option>
                        </select>

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">
                            Filter
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- TABLE -->

    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td>
                                <strong>John Doe</strong>
                            </td>

                            <td>
                                Netflix Indonesia
                            </td>

                            <td>
                                john@netflix.com
                            </td>

                            <td>
                                +62 812 3456 7890
                            </td>

                            <td>
                                Production House
                            </td>

                            <td>
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                            </td>

                            <td>
                                15 Jun 2026
                            </td>

                            <td>

                                <a href="#"
                                class="btn btn-sm btn-primary">
                                View
                                </a>

                                <a href="#"
                                class="btn btn-sm btn-success">
                                Approve
                                </a>

                                <a href="#"
                                class="btn btn-sm btn-danger">
                                Reject
                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td>
                                <strong>Sarah Wijaya</strong>
                            </td>

                            <td>
                                Independent Producer
                            </td>

                            <td>
                                sarah@email.com
                            </td>

                            <td>
                                +62 811 9999 8888
                            </td>

                            <td>
                                Producer
                            </td>

                            <td>
                                <span class="badge bg-success">
                                    Approved
                                </span>
                            </td>

                            <td>
                                14 Jun 2026
                            </td>

                            <td>

                                <a href="#"
                                class="btn btn-sm btn-primary">
                                View
                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td>
                                <strong>Michael Tan</strong>
                            </td>

                            <td>
                                TV Commercial Agency
                            </td>

                            <td>
                                michael@email.com
                            </td>

                            <td>
                                +62 821 1111 2222
                            </td>

                            <td>
                                Agency
                            </td>

                            <td>
                                <span class="badge bg-danger">
                                    Rejected
                                </span>
                            </td>

                            <td>
                                13 Jun 2026
                            </td>

                            <td>

                                <a href="#"
                                class="btn btn-sm btn-primary">
                                View
                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>