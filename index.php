<?php include 'header.php';
$con = OpenCon();

?>
<style>
.bt {
    border-top: 1px solid #1e1f33;
}

.br {
    border-right: 1px solid #282844;
}

div.card-body {
    text-align: justify;
}

.menu-icon {
    width: 33px;
    margin-right: 7%;
}

th,
td {
    white-space: nowrap;
}

.card-custom {
    background: #00bcd4;
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-custom h5 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.card-custom p {
    margin: 5px 0 0 0;
    font-size: 16px;
}
</style>
<?php include 'navbar.php'; ?>
<div class="main-container">
    <div class="pd-ltr-20">

        <div class="content-wrapper">
            <h4 class="card-title text-center mt-4 mb-4" style="font-size: 28px; font-weight: bold;">Comfort Dashboard</h4>

        </div>
    </div>

</div>

<?php include 'footer.php' ?>