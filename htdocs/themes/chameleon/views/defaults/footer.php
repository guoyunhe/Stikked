        </div>

        <?php $this->load->view('defaults/footer_message'); ?>
        
        <script src="https://static.opensuse.org/chameleon-3.0/dist/js/jquery.slim.js"></script>
        <script src="https://static.opensuse.org/chameleon-3.0/dist/js/bootstrap.bundle.js"></script>
        <script src="https://static.opensuse.org/chameleon-3.0/dist/js/chameleon.js"></script>
<?php

//stats
$this->load->view('defaults/stats');

//codemirror modes
if(isset($codemirror_modes)){
    echo '<div style="display: none;" id="codemirror_modes">' . json_encode($codemirror_modes) . '</div>';
}

//ace modes
if(isset($ace_modes)){
    echo '<div style="display: none;" id="ace_modes">' . json_encode($ace_modes) . '</div>';
}
?>
	</body>
</html>
