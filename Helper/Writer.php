<?php

namespace Seyon\PHPBB3\AdminBundle\Helper;

/**
 * Static Class for Helper Methods
 */
class Writer {
    
    /**
     *  create a topic an create an first post and update all needed other informations
     * @param type $em
     * @param \Seyon\PHPBB3\AdminBundle\Entity\Forum $forum
     * @param type $subject
     * @param type $text
     * @param type $posterId
     * @param type $posterName
     * @param type $date
     * @return \Seyon\PHPBB3\AdminBundle\Entity\Topic
     */
    public static function createTopic($em, \Seyon\PHPBB3\AdminBundle\Entity\Forum $forum, $subject, $text, \Seyon\PHPBB3\UserBundle\Entity\User $user, $date = 0){
        
        if($date == 0){
            $date = time();
        }
                
        $topic      = new \Seyon\PHPBB3\AdminBundle\Entity\Topic();
        $topic->forum_id = $forum->forum_id;
        $topic->topic_title = $subject;
        $topic->topic_poster = $user->getId();
        $topic->topic_time = $date;
        $topic->topic_first_poster_name = $user->getUsername();
        $topic->topic_last_poster_name = $user->getUsername();
        $em->persist($topic);
        $em->flush();
        
        $post                   = new \Seyon\PHPBB3\AdminBundle\Entity\Post();
        $post->topic_id         = $topic->topic_id;
        $post->forum_id         = $forum->forum_id;
        $post->poster_id        = $user->getId();
        $post->post_time        = $date;
        $post->post_subject     = $subject;
        $post->post_text        = $text;
        $em->persist($post);
        $em->flush();
        
        $topic->topic_first_post_id     = $post->post_id;
        $topic->topic_last_post_id      = $post->post_id;
        $topic->topic_last_poster_id    = $user->getId();
        $topic->topic_last_post_time    = $date;
        $topic->topic_last_post_subject = $subject;
        $em->persist($topic);
        
        // set forum last post information
        if($date > $forum->forum_last_post_time){
            $forum->forum_last_post_id          = $post->post_id;
            $forum->forum_last_post_subject     = $subject;
            $forum->forum_last_post_time        = $date;
            $forum->forum_last_poster_id        = $user->getId();
            $forum->forum_last_poster_name      = $user->getUsername();
            $em->persist($forum);
        }
        
        
        $em->flush();
        
        return $topic;
    }
    
}