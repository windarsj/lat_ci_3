<?php

class Blog_model extends CI_Model
{

    public function getBlogs($limit, $offset)
    {
        $filter = $this->input->get('find');
        $this->db->like('title', $filter);
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'desc');
        return $this->db->get("blog");
    }

    public function getTotalBlogs()
    {
        $filter = $this->input->get('find');
        $this->db->like('title', $filter);
        return $this->db->count_all_results("blog");
    }

    public function getSingleBlog($field, $url)
    {
        $this->db->where($field, $url);
        return $this->db->get('blog');
    }

    public function insertBlog($data)
    {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    public function updateBlog($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }

    public function deleteBlog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }
}
