from fpdf import FPDF
from PIL import Image, ImageDraw, ImageFont

def create_tree_diagram(text_lines, filename):
    img = Image.new('RGB', (600, 400), color=(255, 255, 255))
    draw = ImageDraw.Draw(img)
    try:
        font = ImageFont.truetype("arial.ttf", 14)
    except IOError:
        font = ImageFont.load_default()
    
    y = 20
    for line in text_lines:
        draw.text((20, y), line, font=font, fill=(0, 0, 0))
        y += 25
    img.save(filename)

# Create a few diagrams
tree_diagrams = {
    "Binary_Tree.png": [
        "     1",
        "    / \\",
        "   2   3",
        "Binary Tree: Each node has at most 2 children."
    ],
    "Binary_Search_Tree.png": [
        "     5",
        "    / \\",
        "   3   7",
        "BST: Left < Root < Right"
    ],
    "Min_Heap.png": [
        "     1",
        "    / \\",
        "   3   6",
        "Min Heap: Parent ≤ Children"
    ],
    "Trie.png": [
        "    root",
        "     |",
        "     c",
        "     |",
        "     a",
        "    / \\",
        "   t   n",
        "Trie: Prefix tree for strings"
    ]
}

for filename, lines in tree_diagrams.items():
    create_tree_diagram(lines, filename)

class PDF(FPDF):
    def add_section(self, title, content, image_path=None):
        self.add_page()
        self.set_font("Arial", "B", 12)
        self.cell(0, 10, title, ln=True)
        self.set_font("Arial", "", 10)
        self.multi_cell(0, 6, content)
        if image_path:
            self.image(image_path, x=30, w=150)
        self.ln()

pdf = PDF()
pdf.set_auto_page_break(auto=True, margin=15)

tree_sections = [
    ("Binary Tree", "A tree where each node has at most two children. Used in parsing and expression evaluation.", "Binary_Tree.png"),
    ("Binary Search Tree (BST)", "A binary tree where left < parent < right. Used for fast lookup and storage.", "Binary_Search_Tree.png"),
    ("AVL Tree", "A self-balancing binary search tree that maintains height balance using rotations.", None),
    ("Red-Black Tree", "A balanced BST with coloring rules to ensure logarithmic height. Used in maps/sets.", None),
    ("Min Heap", "A complete binary tree where each parent is smaller than its children. Used in heaps.", "Min_Heap.png"),
    ("Trie (Prefix Tree)", "Used for storing strings. Each path from root represents a prefix. Ideal for autocomplete.", "Trie.png"),
    ("N-ary Tree", "Each node can have more than two children. Used in XML trees, file systems.", None),
    ("Segment Tree", "Used for range queries (e.g., sum/min). Fast updates and queries on intervals.", None),
    ("Fenwick Tree (BIT)", "Efficient structure for prefix sums. Faster and easier than segment trees.", None),
    ("B-Tree", "Multi-way search tree used in databases and file systems. Keeps data sorted on disk.", None),
    ("B+ Tree", "Variant of B-Tree storing all data in leaves. Internal nodes act as index. Great for range queries.", None)
]

for title, desc, img in tree_sections:
    pdf.add_section(title, desc, img)

pdf.output("Tree_Types_Full_DSA_Guide.pdf")
