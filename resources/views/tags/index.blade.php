<x-app-layout>
<div class="containers">
    <h2>タグ管理</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div>
            <label for="comment">タグ名</label>
            <input type="text" name="comment" id="comment" required>
        </div>
        <button type="submit">タグを追加</button>
    </form>
    <h3>現在のタグ</h3>
    <div class="tags-grid">
        @foreach($tags as $tag)
            <div class="tag-item">
                <button class="tag-button" data-tag="{{ $tag->comment }}">{{ $tag->comment }}</button>
                <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </div>
        @endforeach
    </div>

    <!-- タグ選択のJavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tagButtons = document.querySelectorAll('.tag-button');
        const setNumber = "{{ request('set') }}"; // URLのクエリパラメータからセット番号を取得

        tagButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tagName = this.dataset.tag;

                // 親ウィンドウにあるaddTagToSet関数を呼び出してタグをセットに追加
                window.opener.addTagToSet(setNumber, tagName);
        function addTagToSet(setNumber, tagName) {
        console.log('Add tag to set:', setNumber, tagName);
    // 指定したセットの下にタグを表示するロジック
        const setContainer = document.querySelector(`#set-${setNumber}`);
        if (setContainer) {
            const tagElement = document.createElement('span');
            tagElement.className = 'tag';
            tagElement.textContent = tagName;
    
            setContainer.appendChild(tagElement);
        } else {
        console.error('Set container not found:', `#set-${setNumber}`);
    }
    }
    
                // タグ選択後にこのウィンドウを閉じる
                window.close();
            });
        });
    });
    </script>
</div>
</x-app-layout>

