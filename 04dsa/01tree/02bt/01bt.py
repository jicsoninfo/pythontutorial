

class NodeBt:
       def __init__(self, key):
        self.key = key
        self.left = None
        self.right = None


class BT:
       def __init__(self, root_key):
        self.root = NodeBt(root_key)

       def insert(self, key):
        from collections import deque
        queue = deque([self.root])

       while queue:
        node = queue.popleft()

        if not node.left:
            node.left = NodeBt(key)
            return
       else:
        queue.append(node.left)
       
       if not node.right:
        node.right = NodeBt(key)
        return
       else:
        queue.append(node.right)
       



       
#Example usage
bt = BT(1)
bt.insert(2)
bt.insert(3)
bt.insert(4)       

print(bt)

