<?php
function displayTextInputRow(
  string $label,
  string $inputType,
  string $inputValue,
  string $inputName,
  string $inputPlaceholder,
  string $checkValue,
  string $checkName,
  string $reasonValue,
  string $reasonName,
  string $reasonPlaceholder,
  bool $inputEnabled,
  bool $checkEnabled
) {
  $inputState = $inputEnabled ? "" : "disabled";
  $inputRequired = $inputEnabled ? "required" : "";
  $checkState = $checkEnabled ? "" : "disabled";
  $checkRequired = $checkEnabled ? "required" : "";
?>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label class="control-label"><?php echo $label; ?></label>
        <input type="<?php echo $inputType; ?>" class="form-control" name="<?php echo $inputName; ?>" value="<?php echo $inputValue; ?>" placeholder="<?php echo $inputPlaceholder; ?>" <?php echo $inputRequired; ?> <?php echo $inputState; ?> />
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group text-center">
        <label class="control-label">Sesuai</label>
        <input type="checkbox" class="form-control" name="<?php echo $checkName; ?>" value="<?php echo $checkValue; ?>" <?php echo $checkState; ?> />
      </div>
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label class="control-label">Keterangan</label>
        <textarea class="form-control" name="<?php echo $reasonName; ?>" placeholder="<?php echo $reasonPlaceholder; ?>" <?php echo $checkRequired; ?> <?php echo $checkState; ?>><?php echo $reasonValue; ?></textarea>
      </div>
    </div>
  </div>
<?php
}
