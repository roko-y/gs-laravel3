import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // ビルド出力先
        assetsDir: 'assets',   // アセットディレクトリ
        manifest: true,        // マニフェストファイルの生成
        emptyOutDir: true,     // 古いビルドファイルを削除
    },
});
