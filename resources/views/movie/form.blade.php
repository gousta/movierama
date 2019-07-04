<div class="py-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required value="{{ $movie['title'] ?? '' }}" />
</div>
<div class="py-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="11" required>{{ $movie['description'] ?? '' }}</textarea>
</div>

<div class="text-right">
    <input type="submit" value="SAVE" class="btn btn-primary" />
</div>
