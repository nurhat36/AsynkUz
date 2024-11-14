<tr>
    <td colspan="4">
        <form class="videoForm">
            @csrf
            <input type="hidden" class="video-section-id" name="section_id" value="{{ $section_id }}">

            <table class="table">
                <thead>
                <tr>
                    <th>Video Başlığı</th>
                    <th>Video URL</th>
                    <th>Video Sırası</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                <tr class="video-entry">
                    <td>
                        <input type="text" class="form-control" name="title" required>
                    </td>
                    <td>
                        <input type="url" class="form-control" name="url" required>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="order" value="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-video-button">Kaldır</button>
                        <button type="button" class="btn btn-secondary mb-3 addVideoButton">Yeni Video Ekle</button>
                        <button type="submit" class="btn btn-success">Videoları Kaydet</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </td>
</tr>
