<div class="comments-wrap">
    <?php foreach ($comments as $comment) : ?>
        <h4>
            <a href="<?= comment_author_url(); ?>"><?php comment_author(); ?></a>
            - <small><?php comment_date(); ?></small>
        </h4>
        <div class="comment-body">
            <p><?php comment_text(); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php if ( comments_open() ) : ?>
    <h4>Leave a Comment</h4>
    <form action="<?= site_url('wp-comments-post.php') ?>" method="post" id="commentform">
        <input type="hidden" name="comment_post_ID" value="<?= $post->ID ?>" id="comment_post_ID">
        <div class="form-group">
            <label>Name / Alias (required)</label>
            <input class="form-control" type="text" name="author">
        </div>
        <div class="form-group">
            <label>Email Address (required, not shown)</label>
            <input class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <label>Website (optional)</label>
            <input class="form-control" type="text" name="url">
        </div>
        <div class="form-group">
            <label>Comment</label>
            <textarea class="form-control" rows="7" cols="60" name="comment"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Add Comment</button>
        </div>
    </form>
<?php else : ?>
    <?php _e( 'Comments are closed', 'wpdev' ); ?>
<?php endif; ?>
