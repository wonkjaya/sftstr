<?php 
echo form_open_multipart();
echo form_upload('buku_panduan');
echo form_submit('','submit');
echo form_close();
